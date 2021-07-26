<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use Mail;

class RenewaluploadCron extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makeRenewallist:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make policy renewal count down list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

       try {
        //delete old one
        DB::table('operation_renewal_notification as re')
                ->join('policies as p', 'p.id', '=', 're.policy_id')
                ->whereRaw('DATEDIFF(p.end_date,now())<-30')->delete();
        
        $policyDetails = DB::table('policies as p')
                        ->join('customers as c', 'c.id', '=', 'p.customer_id')
                        ->leftJoin('insurance_product as pr', 'pr.id', '=', 'p.product_id')
                        ->select('p.id as policyId','p.customer_id', DB::raw("(case p.policy_type when 2 then 'Medical' when 3 then 'Motor' else 'General'  end) AS lobdata"),DB::raw(" DATEDIFF(p.end_date,now()) as daydifference"), 'c.channel', DB::raw('DATEDIFF(p.end_date,now()) as datediff'),  'p.end_date as expirydate', 'p.start_date as inceptiondate','c.name as customerName','pr.product_name as productName')->where('p.policy_status', 2)->whereRaw('DATEDIFF(p.end_date,now())<=60')->get();
       $datetime = date('Y-m-d H:i');

       //dd($policyDetails);
       $insert_data = array();
       $renewalRequstArray = array();
       $customerArray = array();
        if ($policyDetails && count($policyDetails) > 0) {
            foreach ($policyDetails as $policyDetail) {
             
                $existpolicyDetails = DB::table('operation_renewal_notification')->where('policy_id', $policyDetail->policyId)->select('id')->first();
           
                if ($existpolicyDetails && count(get_object_vars($existpolicyDetails)) > 0) {
                    continue;
                }


                $insert_data[] = array(
                    'customer_id' =>$policyDetail->customer_id,
                    'policy_id' =>  $policyDetail->policyId,
                    'created_date' => $datetime,
                    'policy_type' => $policyDetail->lobdata
                    
                );
                $salespersonDetails = $this->findSaleperson($policyDetail->customer_id);
                $assignUser = DB::table('users')->select('id')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_SUPERVISER%")->orderBy('id', 'desc')->first();
                $requestNo = substr("CRM-" . uniqid(date("Ymdhis")), 0, -13);
                $policySalesperson = ($salespersonDetails !='')? $salespersonDetails->policy_sales_person:null;
                $lineofbusiness = DB::table('line_of_business')->select('id')->where('status', '1')->where('title', 'like', "%".$policyDetail->productName."%")->orderBy('id', 'desc')->first();
                
                
                $renewalRequstArray = array(
                    'customer_id' =>$policyDetail->customer_id,
                    'crm_request_id' =>  $requestNo,
                    'assigned_to' => $assignUser->id,
                    'user_id' => $assignUser->id,
                    'status' => 0,                    
                    'type' => 3,
                    'notification_start_date' => date('Y-m-d', strtotime('+10 days')),
                    'policy_sales_person' => $policySalesperson,
                    'updated_date' => $datetime, 
                    'crm_line_of_business'=>($lineofbusiness !='')? $lineofbusiness->id:null,
                    'renewal_policy_id'=>$policyDetail->policyId
                    
                );
                

               $customerArray[] = $policyDetail->customerName; 
             
               
               //Insert request details
              $requestId =  DB::table('crm_main_table')->insertGetId($renewalRequstArray);
               
               
               $maildetails = array();
               $maildetails['cc_data'] =['b.alshaya@dbroker.com.sa','m.alabdullatif@dbroker.com.sa'];
               //Operation supervisor
               $operationSupervisor = DB::table('users')->select('email','name')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_SUPERVISER%")->orderBy('id', 'desc')->first();
               $maildetails['to'] = $operationSupervisor->email;
               $maildetails['name'] = $operationSupervisor->name;
               //Operation lead
               $operationLead = DB::table('users')->select('email')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_LEAD%")->orderBy('id', 'desc')->first();
               if($operationLead && count(get_object_vars($operationLead))>0){
                $maildetails['cc_data'][] = $operationLead->email;   
               }
               
               //Sales Manager
               $salesManager = DB::table('users')->select('email')->where('status', '1')->where('roles', 'like', "%ROLE_SALES_LEAD%")->orderBy('id', 'desc')->first();
               if($salesManager && count(get_object_vars($salesManager))>0){
                  $maildetails['cc_data'][] = $salesManager->email;  
               }
              
                //Technical manager
               $technicalManager = DB::table('users')->select('email')->where('status', '1')->where('roles', 'like', "%ROLE_TECHNICAL_HEAD%")->orderBy('id', 'desc')->first();
               $maildetails['cc_data'][] = $technicalManager->email;
               //Sales person
               if($salespersonDetails !='') {
                  $maildetails['cc_data'][] = $salespersonDetails->email;
               }
                $template = 'emails.renewalnotification';
                $url = route('crmrequestOverview', ['requestId' => $requestId]);
                $data['link'] = $url;
                $data['Request_no'] = $requestNo;
                $data['customerName'] = $policyDetail->customerName;

                //Renewal request creation mail send area
                Mail::send($template, $data, function($message) use($maildetails,$data) {
                    $message->to($maildetails['to'], $maildetails['name'])->subject
                            ('New renewal request has created for customers '.$data['customerName']);
                    $message->cc($maildetails['cc_data']);

                    $message->from('info@dbroker.com.sa', 'Diamond Broker');
               });
                

            }
        }
        if (!empty($insert_data)) {

            DB::table('operation_renewal_notification')->insert($insert_data);
            
        }
    $this->info('Renewal count down cron run successfully!');

       } catch (Exception $e) {
            
        }



    }
   /**
    * 
    * @param type $customerId
    */ 
    public function findSaleperson($customerId) {
        
        $salespersonDetails = DB::table('crm_main_table as r')
                ->leftJoin('customers as c', 'c.id', '=', 'r.customer_id')  
                ->leftJoin('users as u', 'r.policy_sales_person', '=', 'u.id')          
                ->where('r.customer_id', $customerId)
                ->where('u.status', 1)
                ->whereNotNull('r.policy_sales_person')
                ->select('r.policy_sales_person','u.email')
                ->first();
        
        return $salespersonDetails;
    }

}
