<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Classes\RequestFiltter;
use Session;
use Excel;

class OperationReportController extends Controller {

    /**
     * 
     * @return type
     */
    public function operationRequest() {
        $typeArray = [1 => 'Addition', 'CCHI Activation', 'Claim approval/Settlement', 'Deletion', 'Downgrade', 'Updated member list', 'Plate No Amendment', 'Card Replacment', 'CCHI Upload Status List', 'MC Certificate', 'Name Amendment',
            'Card Printer Request', 'Invoices Request', 'Upgrade', 'Request', 'Inquiry', 'announcement', 'Request sign', 'Others'];
        
          $statusArray = [1 => 'Open', 'Under process', 'Resolve', 'Pending from insurer', 'Pending from client'];        
          $statusArray[]= 'Completed with invoice';
          $statusArray[]= 'Completed by client request';
          $statusArray[]= 'Completed without invoice';
          $statusArray[]= 'Awaiting Invoice';
          $statusArray[10] = 'Close';
        Session::forget('operationrequestFilterCondition_' . Auth::user()->id);
        $data = array('typeArray' => $typeArray,'statusArray' =>$statusArray);

        return view('Reports/operationrequest', $data);
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function operationRequestFilter(Request $request) {

        $filterObj = new RequestFiltter();
        $filteredResult = $filterObj->getOperationRequest($request);
        $statusArray = [1 => 'Open', 'Under process', 'Resolve', 'Pending from insurer', 'Pending from client'];        
          $statusArray[]= 'Completed with invoice';
          $statusArray[]= 'Completed by client request';
          $statusArray[]= 'Completed without invoice';
          $statusArray[]= 'Awaiting Invoice';
          $statusArray[10] = 'Close';
//     echo "<pre>";
//     print_r($filteredResult);exit;
        $typeArray = [1 => 'Addition', 'CCHI Activation', 'Claim approval/Settlement', 'Deletion', 'Downgrade', 'Updated member list', 'Plate No Amendment', 'Card Replacment', 'CCHI Upload Status List', 'MC Certificate', 'Name Amendment',
            'Card Printer Request', 'Invoices Request', 'Upgrade', 'Request', 'Inquiry', 'announcement', 'Request sign', 'Others'];
        $data = array('typeArray' => $typeArray, "requestData" => $filteredResult, 'statusArray' =>$statusArray);

        return view('Reports/operationrequest', $data);
    }

    /**
     * 
     */
    public function requestExport() {

        $filterObj = new RequestFiltter();
        $request = array();
        $filteredResult = $filterObj->getOperationRequest($request, true);
        $requestArray[] = array('No:', 'Customer', 'Type', 'Policy', 'Status', 'Created date', 'Last updated date', 'Created by', 'Time taken');
        $requestTypeArray = ['', 'Addition', 'CCHI Activation', 'Claim approval/Settlement', 'Deletion', 'Downgrade', 'Updated member list', 'Plate No Amendment', 'Card Replacment', 'CCHI Upload Status List', 'MC Certificate', 'Name Amendment',
            'Card Printer Request', 'Invoices Request', 'Upgrade', 'Request', 'Inquiry', 'announcement', 'Request sign', 'Others'];
        foreach ($filteredResult as $result) {
            $requestArray [] = array(
                'No:' => $result->request_id,
                'Customer' => $result->customerName,
                'Type' => $requestTypeArray[$result->etype],
                'Policy' => $result->policy_number,
                'Status' => $result->statusString,
                'Created date' => date('d-m-Y', strtotime($result->createdAt)),
                'Last updated date' => date('d-m-Y', strtotime($result->updatedAt)),
                'Created by' => $result->userName,
                'Time taken' => $result->daydiff,
            );
        }

        Excel::create('Operationrequestdata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Operation request details');
            $excel->sheet('Requests', function($sheet) use ($requestArray) {
                $sheet->fromArray($requestArray, null, 'A1', false, false);
                $sheet->setPageMargin(array(
                    0.25, 0.30, 0.25, 0.30
                ));
                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#4F5467');
                    $row->setFontColor('#ffffff');
                    $row->setFontSize(16);
                    $row->setFontWeight('bold');
                });
            });
        })->download('xlsx');
    }

    /**
     * 
     * @return type
     */
    public function policyComplaint() {
        $statuseArray = [1 => 'Open', 'Closed'];
        $validityArray = [1 => 'Valid', 'Invalid'];
        Session::forget('policycompliantFilterCondition_' . Auth::user()->id);
        $data = array('statusArray' => $statuseArray, 'validityArray' => $validityArray);

        return view('Reports/complaintlist', $data);
    }

    /**
     * 
     * @param type $request
     * @return type
     */
    public function complaintFilter(Request $request) {
        $filterObj = new RequestFiltter();
        $filteredResult = $filterObj->getComplaintReport($request);
        $statuseArray = [1 => 'Open', 'Closed'];
        $validityArray = [1 => 'Valid', 'Invalid'];
        $data = array('statusArray' => $statuseArray, 'validityArray' => $validityArray, "complaintDetails" => $filteredResult);

        return view('Reports/complaintlist', $data);
    }

    /**
     * 
     */
    public function complaintExport() {
        $filterObj = new RequestFiltter();
        $request = array();
        $filteredResult = $filterObj->getComplaintReport($request, true);
        $requestArray[] = array('Complaint no:', 'Type', 'Client name', 'Policy', 'Requested date', 'Validity', 'Complaint handler', 'Status', 'Created date', 'Last updated date', 'Time taken');
        foreach ($filteredResult as $result) {
            $requestArray [] = array(
                'Complaint no:' => $result->id,
                'Type' => $result->complaintType,
                'Client name' => $result->clientName,
                'Policy' => $result->policy_number,
                'Requested date' => date('d-m-Y', strtotime($result->requested_date)),
                'Validity' => $result->complaintValidity,
                'Complaint handler' => $result->handleUser,
                'Status' => $result->statusString,
                'Created date' => date('d-m-Y', strtotime($result->created_at)),
                'Last updated date' => date('d-m-Y', strtotime($result->updated_at)),
                'Time taken' => $result->daydiff,
            );
        }

        Excel::create('Complaintdata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Complaint details');
            $excel->sheet('Complaints', function($sheet) use ($requestArray) {
                $sheet->fromArray($requestArray, null, 'A1', false, false);
                $sheet->setPageMargin(array(
                    0.25, 0.30, 0.25, 0.30
                ));
                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#4F5467');
                    $row->setFontColor('#ffffff');
                    $row->setFontSize(16);
                    $row->setFontWeight('bold');
                });
            });
        })->download('xlsx');
    }

    /**
     * 
     * @return type
     */
    public function claimReport() {
        $statuseArray = [1 => '[Open] Awaiting info/documents', '[Open]Claim reopened', '[Open] Awaiting repair approval from insurer', '[Open] Awaiting repair check from from insurer'];

        Session::forget('claimFilterCondition_' . Auth::user()->id);
        $data = array('statusArray' => $statuseArray);

        return view('Reports/listClaims', $data);
    }

    /**
     * 
     * @param type $request
     * @return type
     */
    public function claimFilter(Request $request) {
        $filterObj = new RequestFiltter();
        $filteredResult = $filterObj->getClaimReport($request);
        $statuseArray = [1 => '[Open] Awaiting info/documents', '[Open]Claim reopened', '[Open] Awaiting repair approval from insurer', '[Open] Awaiting repair check from from insurer'];

        $data = array('statusArray' => $statuseArray, "claimDetails" => $filteredResult);

        return view('Reports/listClaims', $data);
    }

    /**
     * 
     */
    public function claimExport() {
        $filterObj = new RequestFiltter();
        $request = array();
        $filteredResult = $filterObj->getClaimReport($request, true);
        $requestArray[] = array('Id', 'Policy number', 'Customer', 'Id code/Reg no', 'Status', 'Claimant', 'Claim handler', 'Loss date', 'Submitted date', 'Last updated date', 'Time taken');
        foreach ($filteredResult as $result) {
            $requestArray [] = array(
                'Id' => $result->id,
                'Policy number' => $result->policy_number,
                'Customer' => $result->customerName,
                'Id code/Reg no' => ($result->id_code != null) ? $result->id_code : '',
                'Status' => $result->statusString,
                'Claimant' => ($result->claimant != '') ? $this->generateClaimantString($result->claimant) : '',
                'Claim handler' => $result->claimHandler,
                'Loss date' => ($result->incident_date != null) ? date('d-m-Y h:i', strtotime($result->incident_date)) : '',
                'Submitted date' => date('d-m-Y', strtotime($result->submitted_broker_date)),
                'Last updated date' => date('d-m-Y', strtotime($result->updatedDate)),
                'Time taken' => $result->daydiff,
            );
        }

        Excel::create('Claimdata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Claim details');
            $excel->sheet('Claims', function($sheet) use ($requestArray) {
                $sheet->fromArray($requestArray, null, 'A1', false, false);
                $sheet->setPageMargin(array(
                    0.25, 0.30, 0.25, 0.30
                ));
                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#4F5467');
                    $row->setFontColor('#ffffff');
                    $row->setFontSize(16);
                    $row->setFontWeight('bold');
                });
            });
        })->download('xlsx');
    }

    /**
     * 
     * @param type $claimantString
     * @return type
     */
    private function generateClaimantString($claimantString) {

        $objectJson = json_decode($claimantString, true);
        $objectString = (count($objectJson) > 0) ? '' : '-';
        if (count($objectJson) > 0) {
            foreach ($objectJson as $jsonvalue) {
                foreach ($jsonvalue as $objkey => $value) {
                    $objectString .= ($value !== null) ? $objkey.':' . $value . "," : '';
                }
            }
        }
        return $objectString;
    }

    /**
     * 
     * @return type
     */
    public function endorsementReport() {
        $typeArray = [1 => 'Addition', 'CCHI Activation', 'Claim approval/Settlement', 'Deletion', 'Downgrade', 'Updated member list', 'Plate No Amendment', 'Card Replacment', 'CCHI Upload Status List', 'MC Certificate', 'Name Amendment',
            'Card Printer Request', 'Invoices Request', 'Upgrade', 'Request', 'Inquiry', 'announcement', 'Request sign', 'Others'];
        $statusArray[1] = "Waiting for approval";
        $statusArray[2] = "Approved";
        $statusArray[3] = "Reject";
        Session::forget('endorsementFilterCondition_' . Auth::user()->id);
        $data = array('typeArray' => $typeArray,'statusArray'=>$statusArray);



        return view('Reports/endorsementlist', $data);
    }

    /**
     * 
     * @return type
     */
    public function endorsementFilter(Request $request) {
        $typeArray = [1 => 'Addition', 'CCHI Activation', 'Claim approval/Settlement', 'Deletion', 'Downgrade', 'Updated member list', 'Plate No Amendment', 'Card Replacment', 'CCHI Upload Status List', 'MC Certificate', 'Name Amendment',
            'Card Printer Request', 'Invoices Request', 'Upgrade', 'Request', 'Inquiry', 'announcement', 'Request sign', 'Others'];
        $statusArray[1] = "Waiting for approval";
        $statusArray[2] = "Approved";
        $statusArray[3] = "Reject";

        $filterObj = new RequestFiltter();
        $filteredResult = $filterObj->getEndorsementReport($request);
        $data = array('typeArray' => $typeArray, "endorsementDetails" => $filteredResult, 'statusArray'=>$statusArray);

        return view('Reports/endorsementlist', $data);
    }

    /**
     * 
     */
    public function endorsementExport() {
        $filterObj = new RequestFiltter();
        $request = array();
        $filteredResult = $filterObj->getEndorsementReport($request, true);
        $requestArray[] = array('Policy', 'Endorsement no', 'Type', 'Issue date', 'Inception date','Expiry date','Due date', 'Amount','Status');
        foreach ($filteredResult as $result) {
            $requestArray [] = array(
                'Policy' => $result->policy_number,
                'Endorsement no' => $result->endorsement_number,
                'Type' => $result->typeString,
                'Issue date' => $result->formatted_issueDate,
                'Inception date' =>date('d-m-Y',strtotime($result->start_date)),
                'Expiry date'=> date('d-m-Y',strtotime($result->expiry_date)),
                "Due date"=> ($result->due_date !=null) ? date('d-m-Y',strtotime($result->due_date)) : '-', 
                'Amount' => number_format(round(floatval($result->amount), 2),2), 
                "Status"=>$result->statusString
            );
        }

        Excel::create('Endorsementdata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Endorsement details');
            $excel->sheet('Endorsement', function($sheet) use ($requestArray) {
                $sheet->fromArray($requestArray, null, 'A1', false, false);
                $sheet->setPageMargin(array(
                    0.25, 0.30, 0.25, 0.30
                ));
                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#4F5467');
                    $row->setFontColor('#ffffff');
                    $row->setFontSize(16);
                    $row->setFontWeight('bold');
                });
            });
        })->download('xlsx');
    }

 /**
     * 
     * @param Request $request
     */
    public function renewalrequestReport() {


        return view('Reports/renewalrequest');
    }

    /**
     *
     * @param Request $request
     * @return type
     */
    public function renewalrequestData(Request $request) {

       
       $resultArray = $this->getRenewalData($request,false);
        
        return view('Reports/renewalrequest', array('renewalrequestDetails' => $resultArray));
    }
    
     /**
     * 
     * @param type $conditionFilter
     * @param type $endorsementRequest
     * @return type
     */
    private function generateOperationRequestQuery($conditionFilter, $endorsementRequest) {


        if ($conditionFilter && count($conditionFilter) > 0) {
            foreach ($conditionFilter as $key => $conditionval) {
                switch ($key) {
                    case 'betweenCondition':
                        foreach ($conditionval as $betKey => $betVal) {
                            $endorsementRequest->whereBetween($betKey, [$betVal[0], $betVal[1]]);
                        }

                        break;
                    case 'inCondition':
                        foreach ($conditionval as $inKey => $inVal) {
                            $endorsementRequest->whereIn($inKey, json_decode($inVal));
                        }

                        break;
                    case 'extrawhereArray':
                        if ($conditionval == 60) {

                            $endorsementRequest->where(DB::raw('DATEDIFF(p.end_date,now())'), '<=', 60);
                        } else if ($conditionval == 90) {
                            $endorsementRequest->where(DB::raw('DATEDIFF(p.end_date,now())'), '>', 60);
                            $endorsementRequest->where(DB::raw('DATEDIFF(p.end_date,now())'), '<=', 90);
                        } else {

                            $endorsementRequest->where(DB::raw('DATEDIFF(p.end_date,now())'), '>', 90);
                        }

                        break;


                    default:
                        $endorsementRequest->where(json_decode($conditionval));
                }
            }
        }

        return $endorsementRequest;
    }
    
      /**
     * 
     */
    public function renewalrequestExport() {
        $request = array();        
        $filteredResult = $this->getRenewalData($request,true);
        
           $requestArray[] = array('Client segmant',  'Channel','Policy', 'Policy end date', 'Assign to','Status',  'LOB', 'Client', 'Requirement', 'Date of submission', 'Date of approach', 'Date of last action', 'Expiry date', 'Inception date', 'Current insurer', 'Do we have the renewal',  'Latest comment');

        
        foreach ($filteredResult as $result) {

            $requestArray [] = array(
                'Client segmant' => ($result->premiumAmount > 0) ? $this->findClientSegment($result->premiumAmount) : 'Small',                
                'Channel' => $result->channel,
                'Policy' => ($result->policy_number != '') ? $result->policy_number: '', 
                'Policy end date' => ($result->policyEnd != '') ? date('d-m-Y', strtotime($result->policyEnd)) : '',
                'Assign to' => $result->agent,
                'Status' =>$result->statusString,
                'LOB' => $result->lineofbusinesstitle,
                'Client' => $result->customerName,
                'Requirement' => '',
                'Date of submission' => ($result->technical_reporting_date != '') ? date('d-m-Y', strtotime($result->technical_reporting_date)) : '',
                'Date of approach' => ($result->broking_slip_send_date != '') ? date('d-m-Y', strtotime($result->broking_slip_send_date)) : '',
                'Date of last action' => ($result->lastUpdated != '') ? date('d-m-Y', strtotime($result->lastUpdated)) : '',
                'Expiry date' => ($result->expiryDate != '') ? date('d-m-Y', strtotime($result->expiryDate)) : '',
                'Inception date' => ($result->inceptiondate != '') ? date('d-m-Y', strtotime($result->inceptiondate)) : '',
                'Current insurer' => ($result->insurer_name != '') ? $result->insurer_name : '',
                'Do we have the renewal' => ($result->renewal_status > 0) ? 'Yes' : 'No',                
               
                'Latest comment' => $result->latestComment
            );
        }
        


        Excel::create('Renewalrequestdata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Renewalrequest');
            $excel->sheet('Renewal request', function($sheet) use ($requestArray) {
                $sheet->fromArray($requestArray, null, 'A1', false, false);
                $sheet->setPageMargin(array(
                    0.25, 0.30, 0.25, 0.30
                ));
                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#4F5467');
                    $row->setFontColor('#ffffff');
                    $row->setFontSize(16);
                    $row->setFontWeight('bold');
                });
            });
        })->download('xlsx');
    }
    /**
     * 
     * @param type $request
     * @param type $filterflag
     * @return type
     */
    private function getRenewalData($request,$filterflag=false) {
       
        $quoteRequest = DB::table('crm_main_table as r')
        
                  ->leftJoin('crm_task_table as t', function($leftjoin) {
                                        $leftjoin->on('r.id', '=', 't.crm_main_id');
                                        $leftjoin->where('r.type', 3);
                                    })
                  ->leftJoin('policies as p', function($join) {
                    $join->on('p.id', '=', 'r.renewal_policy_id');
                    
                })                  
           
                ->leftJoin('customers as c', 'c.id', '=', 'r.customer_id')
                ->leftJoin('line_of_business as lb', 'lb.id', '=', 'r.crm_line_of_business')
                ->leftJoin('users as u', 'u.id', '=', 'r.assigned_to')
                
                ->leftJoin('users as us', 'us.id', '=', 'c.technical_handler')
                ->leftJoin('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')        
                ->select('r.*', 'ins.insurer_name','lb.title as lineofbusinesstitle', DB::raw('(select comments from crm_request_comments as rc where rc.request_id=r.id order by rc.id limit 1) as latestComment'), DB::raw('(p.total_premium+p.endorsement_amount) as premiumAmount'),'p.end_date as policyEnd', 'p.renewal_status', 'p.policy_number', 'us.name as handler', 'u.name as agent', 'r.id as mainId', 'c.name as customerName', 't.*',  DB::raw("(case r.status when '0' then 'New' when '1' then 'New' when '2' then 'Technical review' when '3' then 'Document approved' when '4' then 'Quote upload'  when '5' then 'Revise quotation'  when '6' then 'Request policy'  when '7' then 'Policy upload'  when '8' then 'Reject'  when '9' then 'Completed' when '10' then 'Lost' when 11 then 'Pending with sales'   else 'Pending with client'  end) AS statusString"), 'r.updated_date as lastUpdated', 'c.channel', 'p.end_date as expiryDate', 'p.start_date as inceptiondate'); 
        
        if ($filterflag) {
            $conditionFilter = json_decode(Session::get('renewalrequestfilter_' . Auth::user()->id), true);
            $requestObj = $this->generateOperationRequestQuery($conditionFilter, $quoteRequest);
            $resultArray = $requestObj->orderBy('r.updated_date','desc')->get();
        } else {
            $whereArray = [];
            $sessionWhereCondition = [];
           $whereArray[] = ['r.type', '=', 3];
            if ($request->get('startDate') != '' && $request->get('endDate') != '') {
                $quoteRequest->whereBetween('r.created_date', [$request->get('startDate'), $request->get('endDate')]);
                $sessionWhereCondition['betweenCondition']['r.created_date'][] = $request->get('startDate');
                $sessionWhereCondition['betweenCondition']['r.created_date'][] = $request->get('endDate');
            } elseif ($request->get('startDate') != '') {
                $whereArray[] = ['r.created_date', '<=', Carbon::parse($request->get('startDate'))->format('Y-m-d')];
            } elseif ($request->get('endDate') != '') {
                $whereArray[] = ['r.created_date', '<=', $request->get('endDate')];
            } else {
                
            }

            if ($request->get('customerId') > 0) {
                $whereArray[] = ['c.id', '=', $request->get('customerId')];
            }

          
            if (count($whereArray) > 0) {
                $quoteRequest->where($whereArray);
                $sessionWhereCondition['whereCondition'] = json_encode($whereArray);
            }
            Session::put('renewalrequestfilter_' . Auth::user()->id, json_encode($sessionWhereCondition));

            $resultArray = $quoteRequest->orderBy('r.updated_date','desc')->get();
        }
        return $resultArray;
    }
    
        /**
     *
     * @param type $premiumValue
     * @return string
     */
    private function findClientSegment($premiumValue) {
        $segment = '';
        if ($premiumValue <= 500000) {
            $segment = "Small";
        } elseif ($premiumValue <= 3000000) {
            $segment = "Medium";
        } elseif ($premiumValue <= 10000000) {
            $segment = "Large";
        } elseif ($premiumValue > 10000000) {
            $segment = "Key Account";
        }
        return $segment;
    }


}