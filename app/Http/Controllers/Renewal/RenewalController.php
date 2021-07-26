<?php

namespace App\Http\Controllers\Renewal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App;
//use App\Mail\dpportalmail;
use Mail;
use App\customer;
use App\Dpibquoterequest;
use App\crmMain;
use App\crmTask;
use App\crmRequest;
use App\Http\Controllers\Controller;
use Session;
use PDF;
use File;
use Illuminate\Support\Facades\Input;
use Excel;
use Illuminate\Support\Facades\Storage;

class RenewalController extends Controller {

    /**
     * Create customer page
     * @return type
     */
    public function renewalnotificationList($action = '') {
        $userGroup = array('' => '--- not set ---', 'corporate' => 'Corporate', 'retail' => 'Retail', 'sme' => 'SME');

        if ($action == 'clear') {
            Session::forget('renewaldaysfilterform_' . Auth::user()->id);
        }

        $formData = [];
        if (Session::has('renewaldaysfilterform_' . Auth::user()->id)) {
            $formData = json_decode(Session::get('renewaldaysfilterform_' . Auth::user()->id), true);
        }
        $filtername = isset($formData['filtername']) ? $formData['filtername'] : '';
        $filtertype = isset($formData['filtertype']) ? $formData['filtertype'] : '';
        $filtergroup = isset($formData['filtergroup']) ? $formData['filtergroup'] : '';
        $filterDays = isset($formData['filterdays']) ? $formData['filterdays'] : '';
        $lineofbusiness = DB::table('line_of_business')->distinct()->where('status', '1')->orderBy('title')->pluck('title', 'id')->toArray();
        $query = DB::table('operation_renewal_notification as re')
                ->join('policies as p', 'p.id', '=', 're.policy_id')
                ->join('customers as c', 'c.id', '=', 're.customer_id')
                ->leftJoin('customer_contact_person_info as cp', 'c.id', '=', 'cp.customer_id')
                ->select('re.*', 'p.policy_number', 'p.start_date', 'p.end_date', 'c.name', 'p.policy_number', DB::raw("(case p.policy_type when 2 then 'Medical' when 3 then 'Motor' else 'General'  end) AS lobdata"), DB::raw('DATEDIFF(p.end_date,now()) as datediff'), 'c.type', 'c.id_code', 'c.customer_group', 'c.phone as customerPhone', 'cp.email as contactEmail', 'c.email as customerEmail', 'cp.phone as contactPhone', 'c.name');
                

        $renewallist = $this->filterConditions($filtername, $filtertype, $filtergroup, $filterDays, $query);


        $data = array('renewalDatas' => $renewallist, 'usergroup' => $userGroup, 'formData' => $formData, 'lineofbusiness' => $lineofbusiness);

        return view('Renewal/notificationlist', $data);
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function renewalFilter(Request $request) {

        $filtername = $request->get('filter_customer_name', '');
        $filtertype = $request->get('filter_customer_type', '');
        $filtergroup = $request->get('filter_customergroup_oid', '');
        $filterDays = $request->get('filter_remaining_days', '');

        $query = DB::table('operation_renewal_notification as re')
                ->join('policies as p', 'p.id', '=', 're.policy_id')
                ->join('customers as c', 'c.id', '=', 're.customer_id')
                ->leftJoin('customer_contact_person_info as cp', 'c.id', '=', 'cp.customer_id')
                ->select('re.*', 'p.policy_number', 'p.start_date', 'p.end_date', 'c.name', 'p.policy_number', DB::raw("(case p.policy_type when 2 then 'Medical' when 3 then 'Motor' else 'General'  end) AS lobdata"), DB::raw('DATEDIFF(p.end_date,now()) as datediff'), 'c.type', 'c.id_code', 'c.customer_group', 'c.phone as customerPhone', 'cp.email as contactEmail', 'c.email as customerEmail', 'cp.phone as contactPhone', 'c.name');
               
        $renewallist = $this->filterConditions($filtername, $filtertype, $filtergroup, $filterDays, $query);

        $formData = json_decode(Session::get('renewaldaysfilterform_' . Auth::user()->id), true);

        Session::put('renewaldaysfilterform_' . Auth::user()->id, json_encode($formData));
        $userGroup = array('' => '--- not set ---', 'corporate' => 'Corporate', 'retail' => 'Retail', 'sme' => 'SME');
        $lineofbusiness = DB::table('line_of_business')->distinct()->where('status', '1')->orderBy('title')->pluck('title', 'id')->toArray();
        $data = array('renewalDatas' => $renewallist, 'usergroup' => $userGroup, 'formData' => $formData, 'lineofbusiness' => $lineofbusiness);
        return view('Renewal/notificationlist', $data);
    }

    public function saveRenewalrequest(Request $request) {


        $requestId = substr("CRM-" . uniqid(date("Ymdhi")), 0, -13);
        $crmMainObj = new crmMain();
        $crmMainObj->customer_id = $request->get('customer_id');
        $crmMainObj->crm_request_id = $requestId;
        //ASSIGN REQUEST TO SALES LEAD
        //FIND A SALES LEAD
        $assignUser = DB::table('users')->select('id','name','email')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_SUPERVISER%")->orderBy('id')->first();
        if ($assignUser && count(get_object_vars($assignUser)) > 0) {
            $crmMainObj->assigned_to = $assignUser->id;
        }



        $crmMainObj->user_id = Auth::user()->id;
        $crmMainObj->status = 1;
        $crmMainObj->crm_line_of_business = $request->get('request_lineof_business');
        $crmMainObj->type = 3;
        $crmMainObj->priority = 3;
        $crmMainObj->created_date = date('Y-m-d h:i');
        $crmMainObj->updated_date = date('Y-m-d h:i');
        $crmMainObj->policy_id = $request->get('policy_id');
        $crmMainObj->save();
        $crmMainId = $crmMainObj->getKey();
        //Request detail saving area
        $crmRequestObj = new crmRequest();
        $crmRequestObj->crm_id = $crmMainId;
        $crmRequestObj->description = $request->get('request_description');

        $crmRequestObj->save();

        //File upload area

        if ($request->hasFile('document_file')) {

            $this->requestFileUpload($request, $crmMainId);
        }
       $url = route('crmrequestOverview', ['requestId' => $crmMainId]);
       $data = array('name' => $assignUser->name, 'link' => $url, 'Request_no' => $requestId, 'username' => $assignUser->name);
            $templatename = 'emails.assignnotification';
            $maidetails['to'] = $assignUser->email;
            $maidetails['name'] = $assignUser->name;
            $maidetails['subject'] = "CRM Request no: " . $requestId . " was assigned";
            $this->send_email($maidetails, $data, $templatename);
        //MAIL SENDING AREA
        // $users = DB::table('users')->select('email', 'name')->where('status', '1')->where('roles', 'like', "%ROLE_SALES_LEAD%")->orderBy('id')->first();

        $url = route('customeroverview', ['customerId' => $request->get('customer_select')]);
     
       return redirect()->route('crmrequestOverview', $crmMainId)->with('success', 'Successfully added renewal request!');
 

    }

    /**
     * Function to upload renewal request files
     * @param type $request
     * @param type $requestId
     */
    private function requestFileUpload($request, $requestId) {

        $files = $request->file('document_file');
        $insertArray = [];
        $type = 6;
        $customerId = $request->get('customer_id');
        $filename = [];
        $datetime = date('Y-m-d h:i');
        File::isDirectory('uploads/' . $customerId . "/document/") or File::makeDirectory('uploads/' . $customerId . "/document/", 0777, true, true);

        foreach ($files as $uploadedfile) {
            $destinationPath = 'uploads/' . $customerId . "/document/";
            $path_parts = pathinfo($uploadedfile->getClientOriginalName());
            //$newfilename = $path_parts['filename'] . "_" . date('Ymdhis') . '.' . $path_parts['extension'];
            $name_file =  str_replace( array( '\'', '"',',' , ';', '<', '>','#','%','&','@','+','$','!','^','*' ), '', $path_parts['filename']);
            $newfilename = $name_file. "_" . date('Ymdhis') . '.' . $path_parts['extension'];
            $filename[] = $newfilename;
            $uploadedfile->move($destinationPath, $newfilename);
            $insertArray[] = array("customer_id" => $customerId,
                "filename" => $newfilename,
                "document_type" => $type,
                "comment" => 'new files',
                "uploaded_by" => Auth::user()->id,
                "uploaded_at" => $datetime,
                "crm_id" => $requestId
            );
        }

        $customerObj = new customer();
        if (count($insertArray) > 0) {
            DB::table('customer_crm_documents')->insert($insertArray); // Query Builder approach
            //insert log entry
            $logarray = array("crm_id" => $requestId,
                "title" => "Following documents are uploaded: " . implode(',', $filename),
                "old_value" => '',
                "edited_by" => Auth::user()->id,
                "edited_at" => $datetime);
            $customerObj->logInsert('crm_log', $logarray);
        }
    }

    /**
     * 
     * @param type $filtername
     * @param type $filtertype
     * @param type $filtergroup
     * @param type $filterDays
     * @param type $query
     * @return type
     */
    private function filterConditions($filtername, $filtertype, $filtergroup, $filterDays, $query) {
        $whereArray = [];
        $formData = [];
        if ($filtername != '') {
            $whereArray[] = ['c.name', 'LIKE', '%' . $filtername . '%'];

            $formData['filtername'] = $filtername;
        }
        if ($filtertype != '') {
            $whereArray[] = ['c.type', '=', $filtertype];
            $formData['filtertype'] = $filtertype;
        }
        if ($filtergroup != '') {
            $whereArray[] = ['c.customer_group', '=', $filtergroup];
            $formData['filtergroup'] = $filtergroup;
        }

        if (count($whereArray) > 0) {
            $query->where($whereArray);
            Session::put('renewaldaysfilter_' . Auth::user()->id, json_encode($whereArray));
            Session::put('renewaldaysfilterform_' . Auth::user()->id, json_encode($formData));
        }
        if ($filterDays != '') {
            if ($filterDays == 30) {
                $query->whereBetween(DB::raw('DATEDIFF(p.end_date,now())'), [-30, 30]);
            } else if ($filterDays == 60) {
                $query->whereBetween(DB::raw('DATEDIFF(p.end_date,now())'), [30, 60]);
            }

            $formData['filterdays'] = $filterDays;
        } else {
            $query->whereBetween(DB::raw('DATEDIFF(p.end_date,now())'), [-30, 60]);
        }
        
   
        $renewallist = $query->orderBy('datediff', 'asc')
                        ->paginate(12)->setPath(route('renewalnotificationlist'));

        Session::put('renewaldaysfilterform_' . Auth::user()->id, json_encode($formData));

        return $renewallist;
    }
    /**
     * 
     * @return type
     */
    
    public function renewalrequestList() {
      

        $quoteSqlObj = DB::table('crm_main_table as r')
                ->leftJoin('policies as p', 'p.id', '=', 'r.policy_id')
                ->leftJoin('crm_task_table as t', 'r.id', '=', 't.crm_main_id')
                ->leftJoin('crm_request_table as rt', 'r.id', '=', 'rt.crm_id')
                ->leftJoin('customers as c', 'c.id', '=', 'r.customer_id')
                ->leftJoin('line_of_business as lb', 'lb.id', '=', 'r.crm_line_of_business')
                ->leftJoin('users as u', 'u.id', '=', 'r.assigned_to')
                ->where('r.status', '>=', 0)
                ->where('r.type',3)
                ->select('r.*', 'r.id as mainId','lb.title as lineofbusinesstitle', 'c.id as customerId', 'c.name as customerName', 'u.name as assigned', 't.*', 'rt.*', DB::raw("(case r.status when '0' then 'New' when '1' then 'New' when '2' then 'Technical review' when '3' then 'Document approved' when '4' then 'Quote uploaded'  when '5' then 'Revise quotation'  when '6' then 'Request policy'  when '7' then 'Policy uploaded'  when '8' then 'Rejected'  when '9' then 'Completed' when '10' then 'Lost' when '11' then 'Pending with sales' else 'Pending with client' end) AS statusString"),"p.id as policyId","p.policy_number");

        

        $renewalRequest = $quoteSqlObj->orderBy('r.updated_date', 'desc')->get();       

        $data = array("title" => 'Dashboard',
            'quotecount' => 0,
            'policycount' => 0,
            'customercount' => 0,
            'premium' => 0,
            'monthlyPremium' => 0,
            'customercountreport' => 0,
            'policycountreport' => 0,
            'quotecountreport' => 0,
            'notificationCount' => 0,
            "title" => 'Renewal request',
           
            
        );
        $data['requestData'] = $renewalRequest;
        

        return view('Renewal/renewalcrmlist', $data);   
    }
    
     /**
     * To send email
     * @param string $to
     * @param string $data
     */
    private function send_email($maidetails, $data, $template = null) {
        //New quote request is raised

        Mail::send($template, $data, function($message) use($maidetails) {
            $message->to($maidetails['to'], $maidetails['name'])->subject
                    ($maidetails['subject']);

            $message->from('info@dbroker.com.sa', 'Diamond Broker');
        });
    }


    
}
