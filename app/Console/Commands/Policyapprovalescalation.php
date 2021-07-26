<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;

class Policyapprovalescalation extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Policyapprove:escalation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Policy appove delay escaltion';

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
        //policy issue escalation
        \Log::info("Cron is working start!");

        try{
            $this->policyapproveEscalation();
        } catch (Exception $e) {
            
        }
        
        //announcement close escalation
        try{
            $this->announcementcloseEscalation();
        } catch (Exception $e) {
            
        }
        
        //policy rejection escalation
        try{
            $this->policyRejectionEscalation();
        } catch (Exception $e) {
            
        }
         \Log::info("Cron is working end!");
        
    }

    /**
     * Policy post escalation
     */
    private function policyapproveEscalation() {
        $policyDetails = DB::table('policies as p')
                        ->join('customers as c', 'c.id', '=', 'p.customer_id')
                        ->select('p.id as policyId', 'p.customer_id', DB::raw("(case p.policy_type when 2 then 'Medical' when 3 then 'Motor' else 'General'  end) AS lobdata"), DB::raw(" DATEDIFF(now(),p.updated_at) as daydifference"), 'c.channel', DB::raw('TIMESTAMPDIFF(hour,p.updated_at,now()) as timediff'), 'p.end_date as expirydate', 'p.start_date as inceptiondate', 'c.name as customerName', 'p.updated_at')->where('p.policy_status', 1)->get();

        if ($policyDetails && count($policyDetails) > 0) {
            $editTime = date("Y-m-d H:i");
            $template = '';
            foreach ($policyDetails as $policy) {

                if ($policy->timediff > 12) {
                    //update edited time at current time
                    DB::table('policies')->where('id', $policy->policyId)->update(array('updated_at' => $editTime));
                    continue;
                }
                $maildetails = array();
                $data = array();
                if ($policy->timediff >= 2) {
                    //escalation to management staff
                    $maildetails['to'] = "m.alabdullatif@dbroker.com.sa";
                    $maildetails['name'] = "Mohammed Al-Abdullatif";

                    $template = 'emails.policyapproveescalation';

                    $url = route('policyoverview', ['policyId' => $policy->policyId]);
                    $data['link'] = $url;
                    //$data['Request_no'] = $requestNo;
                    $data['customerName'] = $policy->customerName;
                    //Renewal request creation mail send area
                } else if ($policy->timediff >= 1 && $policy->timediff < 2) {
                    //escalation to abdelhani  
                    $financeHead = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_FINANCE_ADMIN%")->orderBy('id', 'desc')->first();
                    $url = route('policyoverview', ['policyId' => $policy->policyId]);
                    $data['link'] = $url;
                    //$data['Request_no'] = $requestNo;
                    $data['customerName'] = $policy->customerName;
                    //Operation supervisor

                    $maildetails['to'] = $financeHead->email;
                    $maildetails['name'] = $financeHead->name;

                    $template = 'emails.policyapproveescalation';
                } else {

                    continue;
                }


                Mail::send($template, $data, function($message) use($maildetails, $data, $policy) {
                    $message->to($maildetails['to'], $maildetails['name'])->subject
                            ('Policy is not issued for customer ' . $policy->customerName);
                    if (array_key_exists("cc_data", $maildetails) && $maildetails['cc_data'] != '') {
                        $message->cc($maildetails['cc_data']);
                    }

                    $message->from('info@dbroker.com.sa', 'Diamond Broker');
                });
            }
        }
    }

    /**
     * announcement close notification
     */
    private function announcementcloseEscalation() {
        $announcementDetails = DB::table('crm_endorsement as ce')
                        ->join('policies as p', 'p.id', '=', 'ce.policy_id')
                        ->join('customers as c', 'c.id', '=', 'p.customer_id')
                        ->select('p.id as policyId', 'p.policy_number', 'ce.id as crmId', 'ce.request_id as crmRequest', 'p.customer_id', DB::raw("(case p.policy_type when 2 then 'Medical' when 3 then 'Motor' else 'General'  end) AS lobdata"), DB::raw(" DATEDIFF(now(),p.updated_at) as daydifference"), 'c.channel', DB::raw('TIMESTAMPDIFF(hour,ce.updated_at,now()) as timediff'), 'p.end_date as expirydate', 'p.start_date as inceptiondate', 'c.name as customerName', 'ce.created_at')->where('ce.type', 17)->whereNotIn('ce.status', [3, 6, 10])->get();


        if ($announcementDetails && count($announcementDetails) > 0) {
            $editTime = date("Y-m-d H:i");
            $template = '';

            foreach ($announcementDetails as $announcement) {
                if ($announcement->timediff > 12) {
                    //update edited time at current time
          
                    DB::table('crm_endorsement')->where('id', $announcement->crmId)->update(array('updated_at' => $editTime));
                    continue;
                }
                $maildetails = array();
                $data = array();
                if ($announcement->timediff >= 2) {

                    //Operation supervisor
                    $operationSupervisor = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_SUPERVISER%")->orderBy('id', 'desc')->first();
                    $maildetails['to'] = $operationSupervisor->email;
                    $maildetails['name'] = $operationSupervisor->name;

                    $template = 'emails.announcementescalation';

                    $url = route('overviewendorsementcrmrequest', ['policyId' => $announcement->policyId, 'requestId' => $announcement->crmId]);
                    $data['link'] = $url;
                    $data['requestnumber'] = $announcement->crmRequest;
                    $data['policynumber'] = $announcement->policy_number;
                    $data['plink'] = route('policyoverview', ['policyId' => $announcement->policyId]);
                    //Renewal request creation mail send area
                } else if ($announcement->timediff >= 1 && $announcement->timediff < 2) {
                    //escalation to abdelhani  
                    //$financeHead = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_FINANCE_ADMIN%")->orderBy('id', 'desc')->first();
                    //Operation supervisor
                    $operationSupervisor = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_SUPERVISER%")->orderBy('id', 'desc')->first();
                    $maildetails['to'] = $operationSupervisor->email;
                    $maildetails['name'] = $operationSupervisor->name;

                    $template = 'emails.announcementescalation';
                    $url = route('overviewendorsementcrmrequest', ['policyId' => $announcement->policyId, 'requestId' => $announcement->crmId]);
                    $data['link'] = $url;
                    $data['requestnumber'] = $announcement->crmRequest;
                    $data['policynumber'] = $announcement->policy_number;
                    $data['plink'] = route('policyoverview', ['policyId' => $announcement->policyId]);
                } else {
                    continue;
                }


                Mail::send($template, $data, function($message) use($maildetails, $data, $announcement) {
                    $message->to($maildetails['to'], $maildetails['name'])->subject
                            ('Announcement request of customer ' . $announcement->customerName . ' is not closed');

                    if (array_key_exists("cc_data", $maildetails) && $maildetails['cc_data'] != '') {
                        $message->cc($maildetails['cc_data']);
                    }
                    $message->from('info@dbroker.com.sa', 'Diamond Broker');
                });
            }
        }
    }

    /**
     * Policy reject escalation
     */
    private function policyRejectionEscalation() {
        $policyDetails = DB::table('policies as p')
                        ->join('customers as c', 'c.id', '=', 'p.customer_id')
                        ->select('p.id as policyId','p.policy_number', 'p.customer_id', DB::raw("(case p.policy_type when 2 then 'Medical' when 3 then 'Motor' else 'General'  end) AS lobdata"), DB::raw(" DATEDIFF(now(),p.updated_at) as daydifference"), 'c.channel', DB::raw('TIMESTAMPDIFF(hour,p.updated_at,now()) as timediff'), 'p.end_date as expirydate', 'p.start_date as inceptiondate', 'c.name as customerName', 'p.updated_at','p.created_by')->where('p.policy_status', 6)->get();

        if ($policyDetails && count($policyDetails) > 0) {
            $editTime = date("Y-m-d H:i");
            $template = '';
          
            foreach ($policyDetails as $policy) {

                if ($policy->timediff > 12) {
                    //update edited time at current time
                    DB::table('policies')->where('id', $policy->policyId)->update(array('updated_at' => $editTime));
                    continue;
                }
                $maildetails = array();
                $data = array();
                if ($policy->timediff >= 2) {
                    //escalation to technical head
                    $technicalManager = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_TECHNICAL_HEAD%")->orderBy('id')->first();
                    $maildetails['to'] = $technicalManager->email;
                    $maildetails['name'] = $technicalManager->name;

                    $template = 'emails.policyrejectescalation';

                    $url = route('policyoverview', ['policyId' => $policy->policyId]);
                    $data['link'] = $url;
                    //$data['Request_no'] = $requestNo;
                    $data['customerName'] = $policy->customerName;
                    $data['policynumber'] = $policy->policy_number;
                    $data['plink'] = route('policyoverview', ['policyId' => $policy->policyId]);
                    //Renewal request creation mail send area
                } else if ($policy->timediff >= 1 && $policy->timediff < 2) {
                    //escalation to created user  
                    $createdUser = DB::table('users')->select('email', 'name')->where('status', '1')->where('id', $policy->created_by)->orderBy('id', 'desc')->first();
                    $url = route('policyoverview', ['policyId' => $policy->policyId]);
                    $data['link'] = $url;
                    //$data['Request_no'] = $requestNo;
                    $data['customerName'] = $policy->customerName;
               
                    $data['policynumber'] = $policy->policy_number;
                    $data['plink'] = route('policyoverview', ['policyId' => $policy->policyId]);

                    $maildetails['to'] = $createdUser->email;
                    $maildetails['name'] = $createdUser->name;

                    $template = 'emails.policyrejectescalation';
                } else {

                    continue;
                }


                Mail::send($template, $data, function($message) use($maildetails, $data, $policy) {
                    $message->to($maildetails['to'], $maildetails['name'])->subject
                            ('Policy of customer ' . $policy->customerName." is rejected");
                    if (array_key_exists("cc_data", $maildetails) && $maildetails['cc_data'] != '') {
                        $message->cc($maildetails['cc_data']);
                    }

                    $message->from('info@dbroker.com.sa', 'Diamond Broker');
                });
            }
        }
    }

}
