<?php

namespace App\Http\Controllers\Comments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Controllers\Controller;
use Session;

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

        return redirect()->route('overviewendorsementcrmrequest', ['policyId' => $policyId, 'requestId' => $requestId])->with('success', 'Successfully added comment!');
    }

}
