<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use App;
use Mail;
use App\customer;
use App\policy;
use App\Policyclaims;
use App\policyComplaint;
use App\User;
use App\Http\Controllers\Controller;
use Session;
use PDF;
use File;

/**
 * This controller handle all the client related actions for client module
 */
class ClientController extends Controller {

    public $customerId = 0;

    /**
     * 
     * @return type
     */
    public function index() {

        $customerId = Auth::user()->customer_id;

        //Request count
        $endorsementRequestDetails = DB::table('crm_endorsement as ecr')
                        ->join('policies as p', function($join) use($customerId) {
                            $join->on('p.id', '=', 'ecr.policy_id');
                            $join->where('ecr.type', '!=', 17);
                            $join->where('p.customer_id', '=', $customerId);
                        })
                        ->select(DB::raw("count(ecr.id) as counts"), DB::raw("(case ecr.status when 3 then 'Resolved' when 2 then 'Under process'  when 4 then 'Pending from insurer' when 5 then 'pending from client' when 6 then 'Completed with invoice' when 7 then 'Completed by client request' when 8 then 'Completed without invoice'  when 9 then 'Awaiting invoice' when 10 then 'Closed' else 'Open'   end) AS statusString"), 'ecr.status')
                        ->groupBy('ecr.status')->orderBy('ecr.status');


        //complaint count
        $complaintDetails = DB::table('policy_complaints as pc')
                        ->join('customers as c', function($join) use($customerId) {
                            $join->on('c.id', '=', 'pc.client_id');
                            $join->where('pc.client_id', $customerId);
                        })
                        ->select(DB::raw("count(pc.id) as counts"), DB::raw("(case pc.request_status when 1 then 'Open'  else 'Closed'   end) AS statusString"), 'pc.request_status')->groupBy('pc.request_status')->orderBy('pc.request_status');

        //claim count
        $allClaimDetails = DB::table('policy_claims as pc')
                        ->join('customers as c', function($join) use($customerId) {
                            $join->on('pc.customer_id', '=', 'c.id');
                            $join->where('pc.customer_id', $customerId);
                        })
                        ->select(DB::raw("count(pc.id) as counts"), DB::raw("(case pc.status when 1 then '[Open] Awaiting info/documents' when 2 then '[Open]Claim reopened' when 3 then '[Open] Awaiting repair approval from insurer' when 4 then '[Open] Awaiting repair check from from insurer' when 5 then '[Open] Under Process With Insurer' when 6 then '[Open] Repair Approval Sent to the client / Awaiting Repair Invoices from the client' when 7 then '[Closed] Partial Approval' when 8 then '[Closed] Claim settled' when 9 then '[Closed] Claim within excess' when 10 then '[Closed] Claim no longer pursued' when 11 then '[Closed] Late Submission' when 12 then '[Closed] Not Covered Under the Policy' when 13 then '[Closed] Not Covered - Policy Terms &amp; Conditions' end) AS statusString"), 'pc.status')
                        ->groupBy('pc.status')->orderBy('pc.status');

        if (in_array('CUSTOMER_MANAGER', Auth::user()->roles)) {
            
        } else if (in_array('CUSTOMER_OFFICER', Auth::user()->roles)) {
            $allClaimDetails->where('pc.created_by', Auth::user()->id);
            $complaintDetails->where('pc.created_by', Auth::user()->id)->orWhere('pc.handle_user', Auth::user()->id);
            $endorsementRequestDetails->where('ecr.created_by', Auth::user()->id);
        } else {
            
        }

        $claimCount = $allClaimDetails->get();
        $complaintCount = $complaintDetails->get();
        $endorsementCount = $endorsementRequestDetails->get();

        $countArray = $this->arrangeCountArray($claimCount, $complaintCount, $endorsementCount);
//dd( $countArray);

        $allPolicies = DB::table('policies as p')
                        ->join('customers as c', function($join) use($customerId) {
                            $join->on('p.customer_id', '=', 'c.id');
                            $join->where('p.customer_id', $customerId);
                            $join->whereIn('p.policy_status', [2, 4, 5]);
                        })
                        ->join('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                        ->leftJoin('policy_product_details as pr', 'pr.policy_id', '=', 'p.id')
                        ->leftJoin('insurance_product as ip', 'ip.id', '=', 'p.product_id')
                        ->select('p.*', DB::raw('DATE_FORMAT(p.start_date, "%d.%m.%Y") as startDate'), DB::raw('DATE_FORMAT(p.end_date, "%d.%m.%Y") as endDate'), 'ins.insurer_name', 'p.id as mainId', 'c.name as customerName', 'ip.product_name', DB::raw("(SELECT CONCAT(
  '[',GROUP_CONCAT(JSON_OBJECT('object_type',object_type,'make',make,'model',model,'year',year,'license_plate',license_plate,'last_name',last_name,'gender',gender,'address',address,'dob',dob,'property_type',property_type,'year_built',year_built,'area',area,'construction_material',construction_material)),
  ']'
) AS list FROM policy_product_object pobj
                                WHERE pobj.policy_id = p.id
                                GROUP BY pobj.policy_id) as objectdetails"), DB::raw("(case p.policy_status when 0 then 'Saved' when 1 then 'Policy posted' when 2 then 'Policy issued' when 4 then 'Expired' when 5 then 'Renewed' when 6 then 'Rejected' 
                                 end) AS statusString"))
                        ->orderBy('p.updated_at', 'desc')->get();


        return view('Client/dashboard', array('allpolicies' => $allPolicies, 'customerId' => $customerId, 'countDetails' => $countArray));
    }

    /**
     * 
     * @return type
     */
    public function claimlist() {
        $customerId = Auth::user()->customer_id;
        $claimDetails = DB::table('policy_claims as pc')
                ->join('customers as c', function($join) use($customerId) {
                    $join->on('pc.customer_id', '=', 'c.id');
                    $join->where('pc.customer_id', $customerId);
                })
                ->join('policies as p', 'p.id', '=', 'pc.policy_id')
                ->leftJoin('users as u', 'u.id', '=', 'pc.claim_handler')
                ->select('pc.*', 'c.name as customerName', 'p.policy_number', 'c.id_code', 'c.customer_code', DB::raw("(SELECT CONCAT(
  '[',GROUP_CONCAT(JSON_OBJECT('name',pci.name,'originalType', pci.claimant_type,'Idnumber',pci.id_number,'membershipNumber',pci.membership_number,'plateNumber',pci.plate_number,'chase Number',pci.chase_number,'certificateNumber',pci.certificate_number, 'type',(case pci.claimant_type when 1 then 'Policy holder' when 2 then 'Death claim' when 3 then 'Medical claim' when 4 then 'Motor claim' else 'Travel claim' end))),
  ']'
) AS list FROM policy_claimant_info pci
                                WHERE pci.claim_id = pc.id
                                GROUP BY pci.claim_id) as claimant"), 'u.name as claimHandler', DB::raw("(case pc.status when 1 then '[Open] Awaiting info/documents' when 2 then '[Open]Claim reopened' when 3 then '[Open] Awaiting repair approval from insurer' when 4 then '[Open] Awaiting repair check from from insurer' when 5 then '[Open] Under Process With Insurer' when 6 then '[Open] Repair Approval Sent to the client / Awaiting Repair Invoices from the client' when 7 then '[Closed] Partial Approval' when 8 then '[Closed] Claim settled' when 9 then '[Closed] Claim within excess' when 10 then '[Closed] Claim no longer pursued' when 11 then '[Closed] Late Submission' when 12 then '[Closed] Not Covered Under the Policy' when 13 then '[Closed] Not Covered - Policy Terms &amp; Conditions' end) AS statusString"));



        if (in_array('CUSTOMER_MANAGER', Auth::user()->roles)) {
            
        } else if (in_array('CUSTOMER_OFFICER', Auth::user()->roles)) {
            $claimDetails->where('pc.created_by', Auth::user()->id);
        } else {
            
        }
        $allClaimDetails = $claimDetails->orderBy('pc.updated_date', 'desc')->get();


        $data = array("title" => 'Claims',
            'claimDetails' => $allClaimDetails);


        return view('Client/listClaims', $data);
    }

    /**
     * 
     * @param type $status
     * @return type
     */
    public function complaintList($status = '') {
        $customerId = Auth::user()->customer_id;
        $complaintQuery = DB::table('policy_complaints as pc')
                ->join('customers as c', function($join) use($customerId) {
                    $join->on('c.id', '=', 'pc.client_id');
                    $join->where('pc.client_id', $customerId);
                })
                ->join('policies as p', 'pc.policy_id', '=', 'p.id')
                ->leftJoin('users as u', 'u.id', '=', 'pc.handle_user')
                ->leftJoin('users as us', 'us.id', '=', 'pc.created_by')
                ->select('pc.*', 'u.name as handleUser', 'us.name as userName', DB::raw("(case pc.request_status when 1 then 'Open'  else 'Closed'   end) AS statusString"), DB::raw("(case pc.request_validity when 1 then 'Valid'  else 'Invalid'   end) AS complaintValidity"), 'p.policy_number', DB::raw("(case pc.compliant_type when 1 then 'Deletion delay' when 2 then 'Treatment rejection by provider' else 'Others'   end) AS complaintType"), "c.name as clientName");


        if ($status != '') {
            if ($status == 1) {
                $complaintQuery->where('pc.request_status', 1);
            } else {
                $complaintQuery->where('pc.request_status', 2);
            }
        }

        if (in_array('CUSTOMER_MANAGER', Auth::user()->roles)) {
            
        } else if (in_array('CUSTOMER_OFFICER', Auth::user()->roles)) {
            $complaintQuery->where('pc.created_by', Auth::user()->id)->orWhere('pc.handle_user', Auth::user()->id);
        } else {
            
        }
        $allComplaintsDetails = $complaintQuery->orderBy('p.updated_at')->get();

        $data = array(
            "title" => 'Complaints',
            'complaintDetails' => $allComplaintsDetails
        );

        return view('Client/complaintlist', $data);
    }

    /**
     * To display crm request of a customer according to the status
     * @param string $status
     * @return type
     */
    public function listCustomerRequest($status = '') {

        $customerId = Auth::user()->customer_id;
        $endorsementQuery = DB::table('crm_endorsement as ecr')
                ->join('policies as p', function($join) use($customerId) {
                    $join->on('p.id', '=', 'ecr.policy_id');
                    $join->where('ecr.type', '!=', 17);
                    $join->where('p.customer_id', '=', $customerId);
                })
                ->leftJoin('users as u', 'u.id', '=', 'ecr.created_by')
                ->leftJoin('users as su', 'su.id', '=', 'ecr.assign_to')
                ->select('ecr.*', 'su.name as AssignName', 'u.name as userName', DB::raw("(case ecr.status when 3 then 'Resolved' when 2 then 'Under process'  when 4 then 'Pending from insurer' when 5 then 'pending from client' when 6 then 'Completed with invoice' when 7 then 'Completed by client request' when 8 then 'Completed without invoice'  when 9 then 'Awaiting invoice' when 10 then 'Closed' else 'Open'   end) AS statusString"), 'p.policy_number');



        if ($status != '') {

            if ($status == 0) {
                $endorsementQuery->whereIn('ecr.status', [1, 2, 4, 5, 9]);
            } else {
                $endorsementQuery->whereIn('ecr.status', [3, 6, 7, 8, 10]);
            }
        }


        if (in_array('CUSTOMER_MANAGER', Auth::user()->roles)) {
            $endorsementQuery->where('p.customer_id', Auth::user()->customer_id);
        } else if (in_array('CUSTOMER_OFFICER', Auth::user()->roles)) {
            $endorsementQuery->where('ecr.created_by', Auth::user()->id);
            $endorsementQuery->where('p.customer_id', Auth::user()->customer_id);
        } else {
            
        }

        $endorsementRequest = $endorsementQuery->orderBy('ecr.updated_at')->get();

        $users = DB::table('users')->distinct()->where('status', '1')->where('roles', 'like', "%CUSTOMER_OFFICER%")->orderBy('name')->pluck('name', 'id')->toArray();


        $data = array("title" => 'Dashboard',
            "title" => 'Endorsement',
            'endorsementDetails' => $endorsementRequest,
            'assignUsers' => $users
        );

        return view('Client/requestFilter', $data);
    }

    /**
     * To get policy details
     * @param integer $policyId
     * @return type
     */
    public function policyDetails($policyId) {



        $policyDetails = DB::table('policies')
                        ->join('customers', 'customers.id', '=', 'policies.customer_id')
                        ->leftJoin('crm_main_table as mt', 'policies.crm_id', '=', 'mt.id')
                        ->leftJoin('insurer_details', 'insurer_details.id', '=', 'policies.insurer_id')
                        ->leftJoin('insurance_product', 'insurance_product.id', '=', 'policies.product_id')
                        ->leftJoin('policy_product_details', 'policy_product_details.policy_id', '=', 'policies.id')
                        ->leftJoin('policies as pp', 'policies.previous_policy_id', '=', 'pp.id')
                        ->select('policies.*', 'pp.policy_number as previusPolicy', 'policy_product_details.*', 'insurer_details.insurer_name', 'policies.id as mainId', 'customers.name as customerName', 'insurance_product.product_name', DB::raw("(case policies.renewal_status when 0 then 'No' when 1 then 'Yes'   end) AS policystatusString"), 'mt.policy_schedule_flag')
                        ->where("policies.id", "=", $policyId)
                        ->orderBy('policies.updated_at', 'desc')->first();




        $whereArray[] = ["policy_commission.policy_id", "=", $policyId];
        $whereArray[] = ["policy_commission.distributor_type", "=", 'diamond'];

        // $companyRevanue = DB::table('policy_commission')
        //                 ->join('policies', 'policies.id', '=', 'policy_commission.policy_id')
        //                 ->leftJoin('users', 'users.id', '=', 'policy_commission.sales_person_id')
        //                 ->select('policy_commission.*', 'users.name as salesperson', DB::raw("SUM(policy_commission.amount) AS totalAmount"))
        //                 ->where($whereArray)
        //                 ->groupBy('policy_commission.distributor_type')
        //                 ->orderBy('policy_commission.id', 'desc')->first();
        //DOCUMENTS DETAILS
        $documentCount = DB::table('dp_customer_document as cd')
                        ->join('policies', 'policies.id', '=', 'cd.policy_id')
                        ->select('cd.id')
                        ->where("cd.policy_id", "=", $policyId)->count();

        $vatAmount = DB::table('policies as p')
                ->leftJoin('policy_intallment as im', 'p.id', '=', 'im.policy_id')
                ->leftJoin('policy_endorsement as pe', 'pe.id', '=', 'im.endorsement_id')
                ->select(DB::raw("SUM(im.vat_amount) AS installmentVat"), "p.vat_amount as premiumVat")
                ->where("p.id", "=", $policyId)
                ->where(function ($query) {
                    $query->where('pe.endorsement_status', '=', 2)
                    ->orWhere('pe.endorsement_status', '=', null);
                })
                ->first();

        //INSTALLMENT DETAILS
        $installmentDetails = DB::table('policy_intallment as im')
                        ->join('policies', 'policies.id', '=', 'im.policy_id')
                        ->leftJoin('policy_endorsement as pe', 'pe.id', '=', 'im.endorsement_id')
                        ->select('im.*', DB::raw("(case collect_by when '1' then 'Broker' when '2' then 'Insurer' when '3' then 'Retailer' else 'Premium financier' end) AS collectionString"), 'pe.endorsement_number')
                        ->where("policies.id", "=", $policyId)
                        ->where(function ($query) {
                            $query->where('pe.endorsement_status', '=', 2)
                            ->orWhere('pe.endorsement_status', '=', null);
                        })
                        ->orderBy('im.start_date', 'asc')->get();



        $endorsementCount = DB::table('policy_endorsement')->select('id')->where('policy_id', $policyId)->where('endorsement_status', 2)->count();

        $endorsementAmount = DB::table('policy_endorsement')->where('policy_id', $policyId)->where('endorsement_status', 2)->sum('amount');


        $claimCount = DB::table('policy_claims')->where('policy_id', $policyId)->count();

        $headTitle = 'Policy overview: ' . (empty($policyDetails->policy_number) ? '--- not issued ---' : $policyDetails->policy_number);
        $policyScheduleCount = DB::table('policy_schedule')->where('policy_id', $policyId)->count();
        $policyRequestCount = DB::table('crm_endorsement')->where('policy_id', $policyId)->count();


        $data = array('policyDetails' => $policyDetails, 'documentCount' => $documentCount, 'customerId' => $policyDetails->customer_id, 'installmentDetails' => $installmentDetails, 'headTitle' => $headTitle, 'overviewTab' => '', 'endorsementCount' => $endorsementCount, 'vatAmount' => $vatAmount, 'endorsementamount' => $endorsementAmount, 'policyscheduleCount' => $policyScheduleCount, 'claimCount' => $claimCount, 'policyrequestCount' => $policyRequestCount);

        return view('Client/policyoverview', $data);
    }

    /**
     * To list endorsement details
     * @param integer $policyId
     * @return type
     */
    public function listEndorsementDetails($policyId) {

        $endorsementDetails = DB::table('policy_endorsement as pe')
                        ->join('policies as p', 'pe.policy_id', '=', 'p.id')
                        ->select('pe.*', DB::raw("(case pe.endorsement_type when 1 then 'Addition' when 3 then 'Deletion'  when 4 then 'Downgrade' when 9 then 'Upgrade'   end) AS typeString"), DB::raw('DATE_FORMAT(pe.start_date, "%d.%m.%Y") as formatted_startDate'), DB::raw('DATE_FORMAT(pe.issue_date, "%d.%m.%Y") as formatted_issueDate'), DB::raw("(case pe.endorsement_status when 3 then 'Rejected' when 2 then 'Approved' when 1 then 'Waiting for approval' end) AS statusString"), 'p.end_date as expiryDate')
                        ->where('pe.policy_id', '=', $policyId)
                        ->where('pe.endorsement_status', '=', 2)
                        ->orderBy('pe.created_at')->get();

        $data = array('endorsementDetails' => $endorsementDetails, "title" => 'Endorsements', 'policyId' => $policyId);


        $returnHTML = view('Client/endorsementList', $data)->render();

        return response()->json(array('status' => true, 'content' => $returnHTML));
    }

    /**
     * To set up endorsement creation form
     * @param integer $policyId
     * @return type
     */
    public function endorsementRequest($policyId) {
        $endorsementRequest = DB::table('crm_endorsement as ecr')
                        ->leftJoin('users as u', 'u.id', '=', 'ecr.created_by')
                        ->select('ecr.*', 'u.name as userName', DB::raw("(case ecr.status when 3 then 'Resolved' when 2 then 'Under process'  when 4 then 'Pending from insurer' when 5 then 'pending from client' when 6 then 'Completed with invoice' when 7 then 'Completed by client request' when 8 then 'Completed without invoice'   when 9 then 'Awaiting invoice'  when 10 then 'closed' else 'Open'   end) AS statusString"))
                        ->where('ecr.policy_id', '=', $policyId)->orderBy('ecr.updated_at');
        if (in_array('CUSTOMER_OFFICER', Auth::user()->roles)) {
            $endorsementRequest->where('ecr.created_by', Auth::user()->id);
        } else {
            
        }

        $requestDetails = $endorsementRequest->get();

        $data = array('endorsementDetails' => $requestDetails, "title" => 'Endorsement request', 'policyId' => $policyId);

        $returnHTML = view('Client/endorsementrequestList', $data)->render();

        return response()->json(array('status' => true, 'content' => $returnHTML));
    }

    /**
     * To display the endorsement crm request details
     * @param integer $policyId
     * @param integer $requestId
     * @return type
     */
    public function endorsementCrmRequestOverview($policyId, $requestId) {


        $overviewData = DB::table('crm_endorsement as ecr')
                        ->join('policies as po', 'po.id', '=', 'ecr.policy_id')
                        ->join('customers as c', 'po.customer_id', '=', 'c.id')
                        ->leftJoin('users as u', 'u.id', '=', 'ecr.created_by')
                        ->leftJoin('users as su', 'su.id', '=', 'ecr.assign_to')
                        ->select('ecr.*', 'c.name as customerName', 'c.id as customerId', 'su.name as AssignName', 'u.name as userName', DB::raw("(case ecr.status when 3 then 'Resolved' when 2 then 'Under process'  when 4 then 'Pending from insurer' when 5 then 'pending from client' when 6 then 'Completed' when 7 then 'Completed by client request' when 8 then 'Completed without invoice'  when 9 then 'Awaiting invoice' when 10 then 'Closed'  else 'Open'   end) AS statusString"), 'po.policy_number', 'po.customer_id')
                        ->where('ecr.id', '=', $requestId)->first();


        $typeArray = [1 => 'Addition', 'CCHI', 'Deletion', 'Downgrade', 'Corrections', 'Certificate', 'Najam upload', 'Invoices Request', 'Upgrade', 'Others', 'Approvals', 'Request quatations', 'Active list'];
        $typeArray[17] = 'Announcement';
        $statusArray = [1 => 'Open', 'Under process', 'Completed', 'Pending from insurer', 'Pending from client'];

        if ($overviewData->type == 17) {
            unset($statusArray[4]);
            unset($statusArray[5]);
        } else if (in_array($overviewData->type, [1, 3, 4, 9])) {
            $statusArray[7] = 'Completed by client request';
            $statusArray[9] = 'Awaiting Invoice';
        }


        $statusArray[10] = 'Close';
        $logDetails = DB::table('endorsement_crm_log as log')
                        ->leftJoin('users as u', 'u.id', '=', 'log.updated_by')
                        ->select('log.*', 'u.name as userName')
                        ->where('log.crm_id', '=', $requestId)->orderBy('log.id', 'desc')->get();

        $whereArray[] = ['doc.endorsement_crm_id', '=', $requestId];
        $whereArray[] = ['doc.policy_id', '=', $policyId];
        $documentDetails = DB::table('dp_customer_document as doc')
                        ->leftJoin('users as u', 'u.id', '=', 'doc.upload_by')
                        ->leftJoin('dp_document_type as dt', 'dt.id', '=', 'doc.type')
                        ->select('doc.*', 'u.name as uploadedBy', 'dt.title as docType', 'doc.id as docId')
                        ->where($whereArray)->orderBy('doc.id', 'desc')->get();
        $documentType = DB::table('dp_document_type')->distinct()->orderBy('id')->pluck('title', 'id')->toArray();

        $commentsDetails = DB::table('crm_endorsement_comments as c')
                        ->join('users as u', 'u.id', '=', 'c.created_by')
                        ->select('c.*', 'u.name as createdBy')
                        ->where('c.request_id', '=', $requestId)
                        ->orderBy('c.created_at', 'desc')->get();
        $relatedWhere[] = ['policy_id', '=', $policyId];
        $relatedWhere[] = ['status', '!=', 3];
        $relatedWhere[] = ['id', '!=', $requestId];

        $relatedRequests = DB::table('crm_endorsement')->where($relatedWhere)->pluck('request_id', 'id')->toArray();
        $users = DB::table('users')->distinct()->where('status', '1')->where('roles', 'like', "%CUSTOMER_OFFICER%")->where('id', '!=', Auth::user()->id)->orderBy('name')->pluck('name', 'id')->toArray();

        //Endorsement details
        $endorsementDetails = DB::table('policy_endorsement')->select('*', DB::raw("(case endorsement_type when 1 then 'Addition' when 3 then 'Deletion'  when 4 then 'Downgrade' when 9 then 'Upgrade'   end) AS typeString"), DB::raw("(case endorsement_status when 3 then 'Rejected' when 2 then 'Approved' when 1 then 'Waiting for approval' end) AS statusString"))->where('endorsement_crm_id', $requestId)->get();
        $breadcrumbDetails = array('url' => action('Client\ClientController@listCustomerRequest', ['status' => 0]), 'title' => 'Endorsement request');

        $data = array('overviewData' => $overviewData, 'policyId' => $policyId, 'requestId' => $requestId, 'typeArray' => $typeArray, 'overviewTab' => 'overview', 'statusArray' => $statusArray, 'logData' => $logDetails, 'documentDetails' => $documentDetails, 'documentType' => $documentType, 'breadcrumb' => $breadcrumbDetails, 'commentDetails' => $commentsDetails, 'relatedrequests' => $relatedRequests, 'assignUsers' => $users, 'endorsementDetails' => $endorsementDetails);


        return view('Client/overviewendorsementrequest', $data);
    }

    /**
     * To assign selected endorsement request to particular user
     * @param Request $request
     * @param type $requestId
     */
    public function assignEndorsementRequestOwner(Request $request, $crmId) {
        $crmrequestObj = App\EndorsementCrm::find($crmId);
        $oldAssignValue = '';
        if ($crmrequestObj->assign_to != null) {
            $oldAssignObj = App\User::find($crmrequestObj->created_by);
            $oldAssignValue = $oldAssignObj->name;
        }
        $changeddate = date('Y-m-d H:i');
        $crmrequestObj->created_by = $request->get('operation_team');
        $crmrequestObj->updated_at = $changeddate;
        $crmrequestObj->save();
        //log entry
        $logArray = array();
        $newAssignObj = App\User::find($request->get('operation_team'));
        $logArray[] = array('crm_id' => $crmId, 'kind' => 'Crm request created person changed to ' . $newAssignObj->name, 'old_value' => $oldAssignValue, 'updated_by' => Auth::user()->id, 'updated_at' => $changeddate);
        if (count($logArray) > 0) {
            DB::table('endorsement_crm_log')->insert($logArray);
        }
        return back()->with(['success' => 'Successfully assigned endorsement request !!!!']);
    }

    /**
     * 
     * @param type $customerId
     * @return type
     */
    public function createrequest($customerId) {

        $activePolicies = DB::table('policies as p')
                        ->join('customers as c', function($join) use($customerId) {
                            $join->on('p.customer_id', '=', 'c.id');
                            $join->where('p.customer_id', $customerId);
                            $join->whereIn('p.policy_status', [2]);
                        })->pluck('p.policy_number', 'p.id')->toArray();

        $requestType = array('endorsement' => 'Endorsement request', 'claim' => 'Claims', 'complaint' => 'Complaint');
        $typeArray = [1 => 'Addition', 'CCHI', 'Deletion', 'Downgrade', 'Corrections', 'Certificate', 'Najam upload', 'Invoices Request', 'Upgrade', 'Others', 'Approvals', 'Request quatations', 'Active list'];
        $complaintType = array(1 => 'Deletion delay', 2 => 'Treatment rejection by provider', 3 => 'Others');

        $data = array('policies' => $activePolicies, 'customer' => $customerId, 'requestType' => $requestType, 'endorsementType' => $typeArray, 'complaintType' => $complaintType);


        return view('Client/addRequest', $data);
    }

    /**
     * 
     * @param Request $request
     * @param type $customerId
     */
    public function saverequestData(Request $request, $customerId) {

        $requestType = $request->get('request_type');

        if ($requestType == 'endorsement') {
            //save endorsement particular client
            $crmId = $this->saveEndorsementRequestData($request, $customerId);
            return redirect()->route('overviewcustomerendorsementrequest', ['policyId' => $request->get('request_policy'), 'requestId' => $crmId])->with('success', 'Successfully created endorsement request!');
        } else if ($requestType == 'claim') {
            //save claim of a particular client
            $claimId = $this->saveClaimData($request, $customerId);
            return redirect()->route('overviewclaim', $claimId)->with('success', 'Successfully created claim request!');
        } else {
            //save complaint of a particular customer
            $complaintId = $this->saveComplaintData($request, $customerId);
            return redirect()->route('complaintoverview', $complaintId)->with('success', 'Successfully created complaint request!');
        }
    }

    /**
     * 
     * @param type $request
     * @param type $customerId
     */
    private function saveEndorsementRequestData($request, $customerId) {
        $requestId = substr("ER-" . uniqid(date("Ymdhi")), 0, -12);
        $userObj = DB::table('users')->select('email', 'id')->where('status', '1')->where('roles', 'like', "%ROLE_OPERATION_SUPERVISER%")->orderBy('id')->first();
        $crmtId = DB::table('crm_endorsement')->insertGetId(array('policy_id' => $request->get('request_policy'), 'description' => $request->get('request_comment'), 'type' => $request->get('endorsement_type'), 'status' => 1, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s'), 'request_id' => $requestId, 'created_by' => Auth::user()->id, 'assign_to' => $userObj->id));
        if ($request->hasFile('endorsement_document_file')) {
            //upload documents
            $this->uploadEndorsementDocument($request, $crmtId, $customerId);
        }

        return $crmtId;
    }

    /**
     * 
     * @param type $request
     * @param type $customerId
     */
    private function saveClaimData($request, $customerId) {
        $policyclaimObj = new Policyclaims();
        $dateObj = date('Y-m-d H:i:s');
        $policyclaimObj->customer_id = $customerId;
        $policyclaimObj->policy_id = $request->get('request_policy');
        $policyclaimObj->created_date = $dateObj;
        $policyclaimObj->created_by = Auth::user()->id;
        $incidentDate = $request->get('claim_date_incident');
        $policyclaimObj->incident_date = date('Y-m-d H:i', strtotime($incidentDate));
        $policyclaimObj->submitted_broker_date = date('Y-m-d');
        $policyclaimObj->location = $request->get('claim_location');
        $policyclaimObj->insurance_claim_number = $request->get('claim_insurace_claimnumber');
        $policyclaimObj->save();
        $claimId = $policyclaimObj->getKey();
        if ($request->hasFile('document_file')) {
            $this->uploadClaimDocument($request, $claimId, $customerId);
        }

        return $claimId;
    }

    /**
     * 
     * @param type $request
     * @param type $customerId
     */
    private function saveComplaintData($request, $customerId) {
        $policyComplaintObj = new policyComplaint();
        $policyComplaintObj->client_id = $customerId;
        $policyComplaintObj->policy_id = $request->get('request_policy');
        $policyComplaintObj->compliant_type = $request->get('complaint_type');
        $policyComplaintObj->requested_date = date('Y-m-d');
        $policyComplaintObj->bill_amount = $request->get('complaint_bill_amount');
        $policyComplaintObj->approve_amount = $request->get('complaint_approve_amount');
        $policyComplaintObj->remarks = $request->get('complaint_remarks');
        $policyComplaintObj->created_by = Auth::user()->id;
        $policyComplaintObj->created_at = date('Y-m-d h:i:s');
        $policyComplaintObj->updated_at = date('Y-m-d h:i:s');
        $policyComplaintObj->save();
        $complaintId = $policyComplaintObj->getKey();

        return $complaintId;
    }

    /**
     * To upload crm document
     * @param Request $request
     * @param integer $requestId
     * @return type
     */
    private function uploadEndorsementDocument($request, $requestId, $customerId) {
        $files = $request->file('endorsement_document_file');
        $insertArray = [];

        $policyId = $request->get('request_policy');
        $filename = [];
        $datetime = date('Y-m-d h:i');
        foreach ($files as $uploadedfile) {
            $destinationPath = 'uploads/' . $customerId . "/document/";
            $path_parts = pathinfo($uploadedfile->getClientOriginalName());
            //$newfilename = $path_parts['filename'] . "_" . date('Ymdhis') . '.' . $path_parts['extension'];
            $name_file = str_replace(array('\'', '"', ',', ';', '<', '>', '#', '%', '&', '@', '+', '$', '!', '^', '*'), '', $path_parts['filename']);
            $newfilename = $name_file . "_" . date('Ymdhis') . '.' . $path_parts['extension'];
            $filename[] = $newfilename;
            $uploadedfile->move($destinationPath, $newfilename);
            $insertArray[] = array("customer_id" => $customerId,
                "file_name" => $newfilename,
                "type" => 1,
                "comment" => '',
                "upload_by" => Auth::user()->id,
                "upload_at" => $datetime,
                "endorsement_crm_id" => $requestId,
                "policy_id" => $policyId
            );
        }
    }

    /**
     * To upload crm document
     * @param Request $request
     * @param integer $requestId
     * @return type
     */
    private function uploadClaimDocument($request, $claimId, $customerId) {

        $files = $request->file('document_file');
        $insertArray = [];
        $policyId = $request->get('request_policy');
        $filename = [];
        $datetime = date('Y-m-d h:i');
        foreach ($files as $uploadedfile) {
            $destinationPath = 'uploads/' . $customerId . "/document/";
            $path_parts = pathinfo($uploadedfile->getClientOriginalName());
            $newfilename = $path_parts['filename'] . "_" . date('Ymdhis') . '.' . $path_parts['extension'];
            $filename[] = $newfilename;
            $uploadedfile->move($destinationPath, $newfilename);
            $insertArray[] = array("customer_id" => $customerId,
                "file_name" => $newfilename,
                "type" => 1,
                "comment" => '',
                "upload_by" => Auth::user()->id,
                "upload_at" => $datetime,
                "claim_id" => $claimId,
                "policy_id" => $policyId
            );
        }

        if (count($insertArray) > 0) {
            DB::table('dp_customer_document')->insert($insertArray); // Query Builder approach
            //insert log entry
            $logArray['claim_id'] = $claimId;
            $logArray['kind'] = "Following documents are uploaded: " . implode(',', $filename);
            $logArray['old_value'] = '';
            $logArray['entered_date'] = $datetime;
            $logArray['edited_by'] = Auth::user()->id;
            DB::table('claim_log')->insert($logArray);
        }
    }

    /**
     * 
     * @return type
     */
    public function getPolicyDetails() {
        $customerId = Auth::user()->customer_id;
        //get all policy detail of the particular 
        $allPolicies = DB::table('policies as p')
                        ->join('customers as c', function($join) use($customerId) {
                            $join->on('p.customer_id', '=', 'c.id');
                            $join->where('p.customer_id', $customerId);
                            $join->whereIn('p.policy_status', [2, 4, 5]);
                        })
                        ->join('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                        ->leftJoin('policy_product_details as pr', 'pr.policy_id', '=', 'p.id')
                        ->leftJoin('insurance_product as ip', 'ip.id', '=', 'p.product_id')
                        ->select('p.*', DB::raw('DATE_FORMAT(p.start_date, "%d.%m.%Y") as startDate'), DB::raw('DATE_FORMAT(p.end_date, "%d.%m.%Y") as endDate'), 'ins.insurer_name', 'p.id as mainId', 'c.name as customerName', 'ip.product_name', DB::raw("(SELECT CONCAT(
  '[',GROUP_CONCAT(JSON_OBJECT('object_type',object_type,'make',make,'model',model,'year',year,'license_plate',license_plate,'last_name',last_name,'gender',gender,'address',address,'dob',dob,'property_type',property_type,'year_built',year_built,'area',area,'construction_material',construction_material)),
  ']'
) AS list FROM policy_product_object pobj
                                WHERE pobj.policy_id = p.id
                                GROUP BY pobj.policy_id) as objectdetails"), DB::raw("(case p.policy_status when 0 then 'Saved' when 1 then 'Policy posted' when 2 then 'Policy issued' when 4 then 'Expired' when 5 then 'Renewed' when 6 then 'Rejected' 
                                 end) AS statusString"))
                        ->orderBy('p.updated_at', 'desc')->get();


        return view('Client/policyList', array('allpolicies' => $allPolicies, 'customerId' => $customerId));
    }

    /**
     * 
     * @param type $claimCount
     * @param type $complaintCount
     * @param type $endorsementCount
     * @return type
     */
    private function arrangeCountArray($claimCount, $complaintCount, $endorsementCount) {
        $countDetailArray = array('claim' => array('active' => 0, 'closed' => 0), 'complaint' => array('active' => 0, 'closed' => 0), 'request' => array('active' => 0, 'closed' => 0));


        foreach ($claimCount as $claimnumber) {
            if (in_array($claimnumber->status, [7, 8, 9, 10, 11, 12, 13])) {
                $countDetailArray['claim']['closed'] = $countDetailArray['claim']['closed'] + $claimnumber->counts;
            } else {
                //active
                $countDetailArray['claim']['active'] = $countDetailArray['claim']['active'] + $claimnumber->counts;
            }
        }

        foreach ($complaintCount as $complaintnumber) {
            if ($complaintnumber->request_status == 1) {
                //open 
                $countDetailArray['complaint']['active'] = $countDetailArray['complaint']['active'] + $complaintnumber->counts;
            } else {
                //active
                $countDetailArray['complaint']['closed'] = $countDetailArray['complaint']['closed'] + $complaintnumber->counts;
            }
        }

        foreach ($endorsementCount as $endorsementnumber) {


            if (in_array($endorsementnumber->status, [3, 10, 6, 7, 8])) {
                //closed
                $countDetailArray['request']['closed'] = $countDetailArray['request']['closed'] + $endorsementnumber->counts;
            } else {
                //active
                $countDetailArray['request']['active'] = $countDetailArray['request']['active'] + $endorsementnumber->counts;
            }
        }

        return $countDetailArray;
    }

    /**
     * Profile detail of a particular company user.
     * @param type $clientId
     */
    public function profileDetails($clientId) {
        $customerDetailObj = DB::table('customers as c')
                ->leftJoin('customer_address as ca', function($join) {
                    $join->on('ca.customer_id', '=', 'c.id');
                })
                ->leftJoin('customer_contact_person_info as cp', 'c.id', '=', 'cp.customer_id')
                ->leftJoin('users as u', 'c.customer_management_user', '=', 'u.id')
                ->leftJoin('users as su', 'c.sales_person', '=', 'su.id')
                ->where('c.id', $clientId)
                ->select('c.*', 'ca.*', 'cp.*', 'c.id as customId', 'c.email as customerEmail', 'c.phone as customerPhone', 'cp.email as contactEmail', 'cp.phone as contactPhone', 'u.name as userName', 'c.name as customerName', 'ca.id as addressId', 'su.name as saleperson');


        $customerDetails = $customerDetailObj->first();

        return view('Client/profile', array('details' => $customerDetails, 'customerId' => $clientId));
    }

    /**
     * 
     * @param type $clientId
     * @return type
     */
    public function clientUsers($clientId) {
        $userDetails = DB::table('users')
                        ->where('customer_id', $clientId)
                        ->where('id', '!=', Auth::user()->id)
                        ->select('*')->get();

        return view('Client/userlist', array('details' => $userDetails, 'customerId' => $clientId));
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function userdelete(Request $request) {
        DB::table('users')
                ->where('id', $request->get('docId'))
                ->update(array('status' => '0'));


        return response()->json(array('success' => true));
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function activateUser(Request $request) {
        DB::table('users')
                ->where('id', '=', $request->get('docId'))
                ->update(array('status' => '1'));


        return response()->json(array('success' => true));
    }

    public function userAddform() {


        return view('Client/addUserForm');
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function saveUserData(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (User::whereEmail($value)->count() > 0) {
                        $fail($attribute . ' is already used.');
                    }
                },
            ],
            'password' => 'required|confirmed|min:8',
            'role' => 'required|string|in:CUSTOMER_MANAGER,CUSTOMER_OFFICER',
        ]);

        $role = array($request->get('role'));

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->remember_token = str_random(10);
        $user->roles = $role;
        $user->user_type = 'customer';
        $user->customer_id = Auth::user()->customer_id;
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();
        $user->id;
        if ($user->id > 0) {
            //send mail to user
            $templatename = 'emails.usercreationnotification';
            $maildetails['to'] = $request->get('email');
            $maildetails['name'] = $request->get('name');
            $data['name'] = $request->get('name');
            $data['username'] = $request->get('email');
            $data['pass'] = $request->get('password');
            $maildetails['subject'] = "Credential details of Diamond broker system";
            $this->send_email($maildetails, $data, $templatename);
        }

        return redirect()->route('listusers', Auth::user()->customer_id)->with('success', 'Successfully created new user!');
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
