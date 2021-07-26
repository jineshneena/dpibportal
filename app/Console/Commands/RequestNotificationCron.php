<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Mail;

class RequestNotificationCron extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Requestnotification:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send renewal request notification ';

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


        $requestDetails = DB::table('crm_main_table as r')
                        ->join('customers as c', 'c.id', '=', 'r.customer_id')
                        ->leftJoin('users as u', 'u.id', '=', 'r.assigned_to')
                        ->leftJoin('users as su', 'su.id', '=', 'r.policy_sales_person')
                        ->select('r.*', 'r.id as mainId', 'r.customer_id', 'r.crm_request_id as requestId', DB::raw("DATEDIFF(r.notification_start_date,now()) as daydifference"), 'c.name as customerName', 'u.email as assignUseremail', 'u.department as department', 'su.email as salespersonemail')->where('r.status', '!=', 9)->where('r.type', 3)->whereRaw('DATEDIFF(r.notification_start_date,now())<0')->get();
        $datetime = date('Y-m-d H:i');


        //dd($policyDetails);
        $insert_data = array();
        $renewalRequstArray = array();
        $customerArray = array();
        if ($requestDetails && count($requestDetails) > 0) {
            foreach ($requestDetails as $requestDetail) {
                $maildetails = array();
                //Current department head
                if ($requestDetail->department == 'sales') {
                    $salesManager = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_SALES_LEAD%")->orderBy('id', 'desc')->first();
                    $maildetails['to'] = $salesManager->email;
                    $maildetails['name'] = $salesManager->name;
                } else if ($requestDetail->department == 'technical') {
                    $technicalManager = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_TECHNICAL_HEAD%")->orderBy('id', 'desc')->first();
                    $maildetails['to'] = $technicalManager->email;
                    $maildetails['name'] = $technicalManager->name;
                } else {
                    $operationSupervisor = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_SUPERVISER%")->orderBy('id', 'desc')->first();
                    $maildetails['to'] = $operationSupervisor->email;
                    $maildetails['name'] = $operationSupervisor->name;
                }

                //Assigned user
                if ($requestDetail->assigned_to != '') {

                    if ($requestDetail->assignUseremail == 'operationperson@dbroker.com.sa') {
                        $maildetails['cc_data'][] = 'diamondoperations@dbroker.com.sa';
                    } else if ($requestDetail->assignUseremail == 'technicalperson@dbroker.com.sa') {
                        $maildetails['cc_data'][] = 'k.alotaibi@dbroker.com.sa';
                    } else if ($requestDetail->assignUseremail == 'salesperson@dbroker.com.sa') {
                        $maildetails['cc_data'][] = 'r.aljabaan@dbroker.com.sa';
                    } else {
                        $maildetails['cc_data'][] = $requestDetail->assignUseremail;
                    }
                }


                //Sales person
                $salespersonDetails = $this->findSaleperson($requestDetail->customer_id);
                $requestSalesPerson = $requestDetail->policy_sales_person;

                if ($requestDetail->policy_sales_person != '' && $requestDetail->salespersonemail != '') {
                    if ($requestDetail->salespersonemail == 'operationperson@dbroker.com.sa') {
                        $maildetails['cc_data'][] = 'diamondoperations@dbroker.com.sa';
                    } else if ($requestDetail->salespersonemail == 'technicalperson@dbroker.com.sa') {
                        $maildetails['cc_data'][] = 'k.alotaibi@dbroker.com.sa';
                    } else if ($requestDetail->salespersonemail == 'salesperson@dbroker.com.sa') {
                        $maildetails['cc_data'][] = 'r.aljabaan@dbroker.com.sa';
                    } else {
                        $maildetails['cc_data'][] = $requestDetail->salespersonemail;
                    }
                } else if ($salespersonDetails != '' && $salespersonDetails != null) {
                    $maildetails['cc_data'][] = $salespersonDetails->email;
                }


                $template = 'emails.renewalnochangenotification';
                $url = route('crmrequestOverview', ['requestId' => $requestDetail->mainId]);
                $data['link'] = $url;
                $data['Request_no'] = $requestDetail->requestId;
                $data['customerName'] = $requestDetail->customerName;
                $data['notificationdate'] = $requestDetail->notification_start_date;

                //Renewal request creation mail send area
                Mail::send($template, $data, function($message) use($maildetails, $data) {
                    $message->to($maildetails['to'], $maildetails['name'])->subject
                            ('No action has been taken for the request' . $data['Request_no']);

                    if (array_key_exists("cc_data", $maildetails) && $maildetails['cc_data'] != '') {
                        $message->cc($maildetails['cc_data']);
                    }

                    $message->from('info@dbroker.com.sa', 'Diamond Broker');
                });
            }
        }

        $this->info('Renewal request no-change cron run successfully!');
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
                ->select('r.policy_sales_person', 'u.email')
                ->first();

        return $salespersonDetails;
    }

}
