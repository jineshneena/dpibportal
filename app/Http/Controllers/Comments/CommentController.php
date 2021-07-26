<?php

namespace App\Http\Controllers\Comments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Controllers\Controller;
use Session;
use Mail;

class CommentController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveComments(Request $request) {

        $crmId = $request->get('crm_request_id');
        $comments = $request->get('crm_comment');
        $commentArray['request_id'] = $crmId;
        $commentArray['comments'] = $comments;
        $commentArray['created_at'] = date('Y-m-d H:i');
        $commentArray['created_by'] = Auth::user()->id;
        $commentId =  DB::table('crm_request_comments')->insertGetId($commentArray);
        if($commentId > 0) {
            
          //update request time
            $updatesArray = array(
           
            'updated_date' => date('Y-m-d H:i')
            
        );
            DB::table('crm_main_table')->where('id', $crmId)
                ->update($updatesArray);
            
        }


        return redirect()->route('crmrequestOverview', $crmId)->with('success', 'Successfully added comment!');
    }

    /**
     * 
     * @param Request $request
     * @param type $policyId
     * @return type
     */
    public function saveEndorsementComments(Request $request, $policyId) {

        $requestId = $request->get('endorsement_request_id');
        $comments = $request->get('crm_comment');
        $commentArray['request_id'] = $requestId;
        $commentArray['comments'] = $comments;
        $commentArray['created_at'] = date('Y-m-d H:i');
        $commentArray['created_by'] = Auth::user()->id;
        DB::table('crm_endorsement_comments')->insert($commentArray);
        //endorsement request details
         $requestData = DB::table('crm_endorsement as ecr')
                        ->leftJoin('users as u', 'u.id', '=', 'ecr.created_by') 
                        ->leftJoin('users as su', 'su.id', '=', 'ecr.assign_to')
                        ->select('u.*','ecr.request_id','su.name as assignUsername','su.email as assignUseremail')
                        ->where('ecr.id', '=', $requestId)->first();
          $templatename = 'emails.commentaddnotification';
          $maildetails['subject'] = "Request ".$requestData->request_id ." has been updated with a new comment ";
          $data['requestId'] = $requestData->request_id;
         if($requestData->user_type =='customer' && Auth::user()->user_type=='user') {

            $maildetails['to']   = $requestData->email;
            $maildetails['name'] = $requestData->name;
            $data['name']        = $requestData->name;
            $data['url']         =  route('overviewcustomerendorsementrequest', ['policyId' =>$policyId,'requestId' => $requestId]);
            
           
            $this->send_email($maildetails, $data, $templatename);
         } else if( Auth::user()->user_type=='customer') {
            
            $maildetails['to']   = $requestData->assignUseremail;
            $maildetails['name'] = $requestData->assignUsername ;
            $data['name']        = $requestData->assignUsername;
            $data['url']         =   route('overviewendorsementcrmrequest', ['policyId' =>$policyId,'requestId' => $requestId]);
           
 
            $this->send_email($maildetails, $data, $templatename);
         }
        
         if (in_array('CUSTOMER_MANAGER', Auth::user()->roles) || in_array('CUSTOMER_OFFICER', Auth::user()->roles)) {
           return redirect()->route('overviewcustomerendorsementrequest', ['policyId' => $policyId, 'requestId' => $requestId])->with('success', 'Successfully added comment!');
        } else  { 
        return redirect()->route('overviewendorsementcrmrequest', ['policyId' => $policyId, 'requestId' => $requestId])->with('success', 'Successfully added comment!');
    }

        
}
    
    /**
     * Mail sending function
     * @param type $maildetails
     * @param type $data
     * @param type $template
     */
    private function send_email($maildetails, $data, $template = null) {
        //New quote request is raised

        if ($maildetails['to'] == 'operationperson@dbroker.com.sa') {
            $maildetails['to'] = 'diamondoperations@dbroker.com.sa';
        } else if ($maildetails['to'] == 'technicalperson@dbroker.com.sa') {
            $maildetails['to'] = 'k.alotaibi@dbroker.com.sa';
        } else if ($maildetails['to'] == 'salesperson@dbroker.com.sa') {
            $maildetails['to'] = 'r.aljabaan@dbroker.com.sa';
        }

        Mail::send($template, $data, function($message) use($maildetails) {
            $message->to($maildetails['to'], $maildetails['name'])->subject
                    ($maildetails['subject']);
            if (array_key_exists("cc_data", $maildetails) && $maildetails['cc_data'] != '') {
                $message->cc($maildetails['cc_data']);
            }
            $message->from('info@dbroker.com.sa', 'diamondbroker');
        });
    }


}
