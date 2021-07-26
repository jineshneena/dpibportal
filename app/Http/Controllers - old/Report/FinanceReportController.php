<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Classes\FinanceFiltter;
use Session;
use Excel;



class FinanceReportController extends Controller {

    /**
     * 
     * @return type
     */
    public function invoiceDetails() {
        $statusArray = array('0' => 'Invoice created', '1' => 'Paid');
        Session::forget('invoicefilter_' . Auth::user()->id);

        return view('Reports/financeinvoice', array('statusArray' => $statusArray));
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function invoiceFilter(Request $request) {

        $filterObj = new FinanceFiltter();
        $filteredResult = $filterObj->getFinanceRequest($request);

        $statusArray = array('0' => 'Invoice created', '1' => 'Paid');
        $data = array('statusArray' => $statusArray, "invoiceDetails" => $filteredResult);

        return view('Reports/financeinvoice', $data);
    }

    /**
     * 
     */
    public function invoiceExport() {

        $filterObj = new FinanceFiltter();
        $request = array();
        $filteredResult = $filterObj->getFinanceRequest($request, true);
        $requestArray[] = array('Invoice No:', 'Customer', 'Policy', 'Invoice date', 'Invoice amount', 'Status', 'Last action', 'Last action date', 'Remarks', 'Payment date');

        foreach ($filteredResult as $result) {
            $requestArray [] = array(
                'Invoice No:' => $result->invoiceId,
                'Customer' => $result->name,
                'Policy' => $result->policy_number,
                'Invoice date' => date('d-m-Y', strtotime($result->invoice_due_date)),
                'Invoice amount' => round(floatval($result->invoice_sum), 2),
                'Status' => $result->invoiceStatusString,
                'Last action' => $result->lastAction,
                'Last action date' => ($result->lastactionDate != '') ? date('d-m-Y', strtotime($result->lastactionDate)) : '',
                'Remarks' => $result->remarks,
                'Payment date' => ($result->paymentDate != '') ? date('d-m-Y', strtotime($result->paymentDate)) : ''
            );
        }

        Excel::create('invoicerequestdata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Invoice request details');
            $excel->sheet('Invoice', function($sheet) use ($requestArray) {
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

    public function productionDetails() {
        $statusArray = array('0' => 'Policy', '1' => 'Endorsement');
         $form = array();
        Session::forget('financeproduction_' . Auth::user()->id);
        Session::forget('financeendorsement_' . Auth::user()->id);
        Session::forget('financeproductionall_' . Auth::user()->id);
        $insuranceCompany = DB::table('insurer_details')->distinct()->where('status', '1')->orderBy('id')->pluck('insurer_name', 'id')->toArray();
        //salesperson
        $salesPerson = DB::table('users')->distinct()->where('status', '1')->orderBy('name')->pluck('name', 'id')->toArray();
        //Products
        $products = DB::table('insurance_product')->distinct()->where('status', '1')->orderBy('product_name')->pluck('product_name', 'id')->toArray();
        return view('Reports/financeproduction', array('statusArray' => $statusArray,'insuranceCompanies'=>$insuranceCompany,'formData'=>$form,'salesperson'=>$salesPerson, 'products'=>$products));
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function productionFilter(Request $request) {

        $filterObj = new FinanceFiltter();
        $form = array();
         $form['inceptionStart'] =  $request->get('ins_startDate');
         $form['inceptionEnd'] =  $request->get('ins_endDate');
         $form['endStart'] =        $request->get('end_startDate');
         $form['endEnddate'] =       $request->get('end_endDate');
         $form['customerId'] =       $request->get('customerId');
         $form['status'] =    ($request->has('post_status'))  ?  $request->get('post_status'):'';
         $form['insurer'] =   ($request->has('insurer'))  ?  $request->get('insurer'):''; 
         $form['startdate'] =   ($request->has('startdate'))  ?  $request->get('startdate'):''; 
         $form['enddate'] =   ($request->has('enddate'))  ?  $request->get('enddate'):''; 
         $form['salesperson'] =   ($request->has('salesperson'))  ?  $request->get('salesperson'):'';
         $form['product'] =   ($request->has('product'))  ?  $request->get('product'):'';
         
         
         $form['inceptioncheck'] =   ($request->has('inceptioncheck'))  ?  $request->get('inceptioncheck'):'';
         $form['duedatecheck'] =   ($request->has('duedatecheck'))  ?  $request->get('duedatecheck'):''; 
         $form['enddatecheck'] =   ($request->has('enddatecheck'))  ?  $request->get('enddatecheck'):''; 


         
         if($form['customerId'] >0) {
          $customerDetails = DB::table('customers')->where('id',$form['customerId'])->select('name')->first();
             $form['customerName'] = $customerDetails->name;   
         }
       
        if($request->get('search') =='') {
          $form['customerId']=0;  
        }

        $filteredResult = $filterObj->getProductionRequest($request, 'financeproduction_');
        $endorsementDetails = $filterObj->getEndorsementRequest($request, 'financeendorsement_');
        $mergeDetails = $filterObj->getAllInstallmentDetails($request, 'financeproductionall_');
        $insuranceCompany = DB::table('insurer_details')->distinct()->where('status', '1')->orderBy('id')->pluck('insurer_name', 'id')->toArray();
        $statusArray = array('0' => 'Policy', '1' => 'Endorsement');
        //salesperson
        $salesPerson = DB::table('users')->distinct()->where('status', '1')->orderBy('name')->pluck('name', 'id')->toArray();
        //Products
        $products = DB::table('insurance_product')->distinct()->where('status', '1')->orderBy('product_name')->pluck('product_name', 'id')->toArray();

        $data = array('statusArray' => $statusArray, "productionDetails" => $filteredResult, 'endorsementDetails' => $endorsementDetails, 'allDetails' => $mergeDetails,'insuranceCompanies'=>$insuranceCompany,'formData'=>$form,'salesperson'=>$salesPerson, 'products'=>$products);

        return view('Reports/financeproduction', $data);
    }

    private function comparisondate($a, $b) {
        return strcmp($a["expirydate"], $b["expirydate"]);
    }

    /**
     * 
     */
    public function productionExport() {

        $filterObj = new FinanceFiltter();
        $request = array();
        $filteredResult = $filterObj->getProductionRequest($request, 'financeproduction_', true);
        $endorsementDetails = $filterObj->getEndorsementRequest($request, 'financeendorsement_', true); 
        $mergeDetails = $filterObj->getAllInstallmentDetails($request, 'financeproductionall_', true); 
      
        $requestArray[] = array('Policy no:', 'Type','Product', 'Customer','Id code', 'Insurer','Inception date', 'End date','Due date','Issue date','Gross amount', 'Vat', 'Total amount', 'Commission', 'Commision amount','Commission vat','Unpaid','Collects','Sales person','Sales commission','Sales commission amount' );
        $endorsementArray[] = array('Policy no:', 'Type','Product', 'Endorsement number',  'Customer','Insurer', 'Inception date','End date', 'Due date','Issue date','Gross amount', 'Vat', 'Total amount', 'Commission', 'Commision amount','Commission vat','Unpaid','Collects','Sales person','Sales commission','Sales commission amount');

        $AllListArray[] = array('Policy no:', 'Policy type','Product', 'Endorsement number','Type',  'Customer', 'Insurer','Inception date','End date', 'Due date','Issue date','Gross amount', 'Vat', 'Total amount', 'Commission', 'Commision amount','Commission vat','Unpaid','Collects','Sales person','Sales commission','Sales commission amount');


        foreach ($filteredResult as $result) {
            $commission = ($result->commision > 0) ? $result->commision:0;
            $requestArray [] = array(
                'Policy no:' => $result->policy_number,
                'Type' =>$result->policyType,
                'Product' =>$result->productName,
                'Customer' => $result->customerName,
                'Id code' =>$result->idCode,
                'Insurer' =>$result->insurer_name,
                'Inception date' => date('d-m-Y', strtotime($result->inceptiondate)),
                'End date' => date('d-m-Y', strtotime($result->expirydate)),
                'Due date' => date('d-m-Y', strtotime($result->endorsementDuedate)),
                 'Issue date'=>date('d-m-Y', strtotime($result->policyissuedate)),
                'Gross amount' =>number_format(round(floatval($result->premiumAmount), 2),2),
                'Vat' =>number_format(round(floatval($result->policyvatAmount), 2),2),
                'Total amount' => number_format(round(floatval($result->policyvatAmount)+floatval($result->premiumAmount), 2),2),
                'Commission' =>$result->commision,
                'Commission amount' =>number_format(round(floatval(($result->premiumAmount*$commission)/100), 2),2),
                'Commission vat' =>number_format(round(floatval(($result->premiumAmount*$commission)/100), 2)*.15,2),
                'Unpaid' =>number_format(round(floatval($result->policyvatAmount)+floatval($result->premiumAmount), 2),2),
                'Collects' =>$result->collectionType,
                'Sales person' =>$result->salesPerson,
                'Sales commission' =>$result->salesCommission,
                'Sales commission amount' =>number_format($result->salesCommissionamount,2)
            );
        }

        foreach ($endorsementDetails as $result) {
            $commission = ($result->commision > 0) ? $result->commision:0;
            $endorsementArray [] = array(
                'Policy no:' => $result->policy_number,                
                'Type' =>$result->policyType,
                'Product' =>$result->product_name,
                'Endorsement number' => ($result->endorsement_number != '') ? $result->endorsement_number : '',
                'Customer' => $result->customerName,
                'Insurer' =>$result->insurer_name,               
                'Inception date' => date('d-m-Y', strtotime($result->endorsementIssuedate)),
                'End date' =>  (date('d-m-Y', strtotime($result->expirydate))),
                'Due date' => date('d-m-Y', strtotime($result->endorsementDuedate)),
                 'Issue date'=>date('d-m-Y', strtotime($result->endorsementIssuedate)),
                'Gross amount' => number_format(round(floatval($result->premiumAmount), 2),2),
                'Vat' => number_format(round(floatval($result->endorsementvatAmount), 2),2),
                'Total amount' =>number_format(round(floatval($result->endorsementvatAmount)+floatval($result->premiumAmount), 2),2), 
                'Commission' => $result->commision,
                'Commision amount' => number_format(round(floatval(($result->premiumAmount*$commission)/100), 2),2),
                'Commission vat'=>number_format(round(floatval(($result->premiumAmount*$commission)/100), 2)*.15,2),
                'Unpaid' => number_format(round(floatval($result->endorsementvatAmount)+floatval($result->premiumAmount), 2),2),
                'Collects' => $result->collectionType,
                'Sales person' => $result->salesPerson,
                'Sales commission' =>$result->salesCommission,
                'Sales commission amount' => number_format($result->salesCommissionamount,2) 
            );
        }

        $i = 1;

//        foreach ($mergeDetails as $result) {
//            $AllListArray[$i] = array(
//                'Policy no:' => $result->policy_number,
//                'Type' => (isset($result->product_name) && $result->product_name != '') ? $result->product_name : '',
//                'Endorsement number' => (isset($result->endorsement_number) && $result->endorsement_number != '') ? $result->endorsement_number : ''
//            );
//            $AllListArray[$i]['Customer'] = $result->customerName;
//            $AllListArray[$i]['Validity'] = (isset($result->endorsement_number) && $result->endorsement_number != '') ? date('d-m-Y', strtotime($result->endorsementStart)) . "-" . date('d-m-Y', strtotime($result->expirydate)) : date('d-m-Y', strtotime($result->inceptiondate)) . "-" . date('d-m-Y', strtotime($result->expirydate));
//            $AllListArray[$i]['Customer'] = $result->customerName;
//            $AllListArray[$i]['Due date'] = (isset($result->endorsementDuedate) && $result->endorsementDuedate != '') ? date('d-m-Y', strtotime($result->endorsementDuedate)) : '';
//            $AllListArray[$i]['Amount'] = round(floatval($result->premiumAmount), 2);
//            $AllListArray[$i]['Vat'] = (isset($result->endorsement_number) && $result->endorsement_number != '') ? round(floatval($result->endorsementvatAmount), 2) : round(floatval($result->policyvatAmount), 2);
//
//            $i++;
//        }
        
        
        
        
        foreach ($mergeDetails as $result) {
            $commission = ($result->commision > 0) ? $result->commision:0;
            $AllListArray [] = array(
                'Policy no:' => $result->policy_number,                
                'Policy type' =>$result->policyType,
                'Product' =>$result->product_name,
                'Endorsement number' => ($result->endorsementId != '') ? $result->endorsement_number : '',
                'Type' =>($result->insType == 2) ? 'Endorsement' : 'Installment',
                'Customer' => $result->customerName,  
                'Insurer' =>$result->insurer_name,             
                'Inception date' =>   date('d-m-Y', strtotime($result->beginDate)),
                'End date' =>  (date('d-m-Y', strtotime($result->expirydate))),
                'Due date' => date('d-m-Y', strtotime($result->dueDate)),
                'Issue date'=>date('d-m-Y', strtotime($result->ppeIssue)),
                'Gross amount' =>  number_format(round(floatval($result->premiumAmount), 2),2),
                'Vat' => number_format(round(floatval($result->vatAmount), 2),2),
                'Total amount' =>number_format(round(floatval($result->premiumAmount)+floatval($result->vatAmount), 2),2), 
                'Commission' => $result->commision,
                'Commision amount' =>number_format(round(floatval(($result->premiumAmount*$commission)/100), 2),2),
                'Commission vat'=>number_format(round(floatval(($result->premiumAmount*$commission)/100), 2)*.15,2),
                'Unpaid' => number_format(round(floatval($result->vatAmount)+floatval($result->premiumAmount), 2),2),
                'Collects' => $result->collectionType,
                'Sales person' => $result->salesPerson,
                'Sales commission' =>$result->salesCommission,
                'Sales commission amount' =>number_format($result->salesCommissionamount,2),
            );
        }



        Excel::create('financeproductiondata_' . date('Ymdhis'), function($excel) use ($requestArray, $endorsementArray, $AllListArray) {
            $excel->setTitle('Production details');
            $excel->sheet('Policies', function($sheet) use ($requestArray) {
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

            //Renewal sheet creation area
            $excel->sheet('Endorsement', function($sheet) use ($endorsementArray) {
                $sheet->fromArray($endorsementArray, null, 'A1', false, false);
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
            });       //Renewal sheet creation area
            $excel->sheet('All', function($sheet) use ($AllListArray) {
                $sheet->fromArray($AllListArray, null, 'A1', false, false);
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

    public function installmentDetails() {
        $statusArray = array('0' => 'Unpaid', '1' => 'Paid');
        $form = array();
        $policyTypeArray = array('1' => 'General', '2' => 'Medical','3'=>'Motor');
        $insuranceCompany = DB::table('insurer_details')->distinct()->where('status', '1')->orderBy('id')->pluck('insurer_name', 'id')->toArray();
        Session::forget('financeinstallment_' . Auth::user()->id);

        return view('Reports/financeinstallment', array('statusArray' => $statusArray,'typeArray'=>$policyTypeArray,'insurer'=>$insuranceCompany,'formData'=>$form));
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function installmentFilter(Request $request) {

        $filterObj = new FinanceFiltter();
        $form = array();
     
         $form['endStart'] =        $request->get('startDate');
         $form['endEnd'] =       $request->get('endDate');
         $form['customerId'] =       $request->get('customerId');
         $form['ptype'] =    ($request->has('policy_type'))  ?  $request->get('policy_type'):'';
         $form['insurer'] =   ($request->has('insurer'))  ?  $request->get('insurer'):''; 

         if($form['customerId'] >0) {
          $customerDetails = DB::table('customers')->where('id',$form['customerId'])->select('name')->first();
             $form['customerName'] = $customerDetails->name;   
         }
       
        if($request->get('search') =='') {
          $form['customerId']=0;  
        }
        $policyTypeArray = array('1' => 'General', '2' => 'Medical','3'=>'Motor');
        $filteredResult = $filterObj->getInstallmentRequest($request);
         $insuranceCompany = DB::table('insurer_details')->distinct()->where('status', '1')->orderBy('id')->pluck('insurer_name', 'id')->toArray();
        $statusArray = array(0 => 'Unpaid', 1 => 'Paid');
        $data = array('statusArray' => $statusArray, "installmentDetails" => $filteredResult,'typeArray'=>$policyTypeArray,'insurer'=>$insuranceCompany,'formData'=>$form);

        return view('Reports/financeinstallment', $data);
    }

    /**
     * 
     */
     public function installmentExport() {

        $filterObj = new FinanceFiltter();
        $request = array();
        $filteredResult = $filterObj->getInstallmentRequest($request, true);

        $requestArray[] = array('Policy no:','Installment No:','Insurer', 'Customer','Product' ,'End date', 'Due date', 'Amount', 'Vat', 'Vat amount', 'Total amount', 'Status');

        //getall installment of policy
$allInstallmentDetails =  DB::table('policy_intallment as im')
                ->join('policies as p', function($join) {
                    $join->on('im.policy_id', '=', 'p.id');
                    $join->whereIn('p.policy_status', [2, 4, 5]);
                })
                ->join('customers as c', 'c.id', '=', 'p.customer_id')
                ->leftJoin('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                ->leftJoin('insurance_product', 'insurance_product.id', '=', 'p.product_id')
                ->select( 'p.id as mainId','im.id as insId')
                ->where('im.installment_type', '=', 1)->orderBy('im.due_date')->get();

$policyInstallmentArray = array();
foreach($allInstallmentDetails as $installment) {
  $policyInstallmentArray[$installment->mainId][]=$installment->insId;
}

        foreach ($filteredResult as $result) {

            $policyarray = $policyInstallmentArray[$result->mainId];

            $installmentNo = array_search($result->insId, $policyarray); // $key = 2;


            $requestArray [] = array(
                'Policy no:' => $result->policy_number,
                'Installment No:' =>$installmentNo+1,
                'Insurer' => $result->insurer_name,
                'Customer' => $result->customerName,
                'Product'=> $result->product_name,
                'End date' => ($result->instEnddate !== null) ? date('d-m-Y', strtotime($result->instEnddate)) : date('d-m-Y', strtotime($result->instEnddate)),
                'Due date' => ($result->instDuedate !== null) ? date('d-m-Y', strtotime($result->instDuedate)) : date('d-m-Y', strtotime($result->instDuedate)),
                'Amount' => number_format(round(floatval($result->instAmount), 2),2),
                'Vat (Perventage)' => $result->instvatpercentage,
                'Vat  Amount' => ($result->instVatamount !== null) ? number_format(round(floatval($result->instVatamount), 2),2) : number_format(round(floatval($result->instVatamount), 2),2),
                'Total amount' => number_format(round(floatval($result->instAmount + $result->instVatamount), 2),2),
                'Status' => ($result->instPaidstatus == 0) ? 'Unpaid' : 'Paid'
            );
        }

        Excel::create('financeinstallmentdata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Installment details');
            $excel->sheet('Installment', function($sheet) use ($requestArray) {
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


     
    public function postrequestDetails() {
        $statusArray = array('0' => 'Policy', '1' => 'Endorsement');
        $poststatusArray = array(1 => 'Waiting for approval', 2 => 'Approved',3=>"Rejected");
        $form = array();
        Session::forget('postpolicyrequest_' . Auth::user()->id);
        Session::forget('postendorsementrequest_' . Auth::user()->id);

        return view('Reports/postrequest', array('statusArray' => $statusArray, 'poststatusArray' => $poststatusArray,'formData'=>$form));
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function postrequestFilter(Request $request) {

        $filterObj = new FinanceFiltter();
        
        $form = array();
         $form['inceptionStart'] =  $request->get('ins_startDate');
         $form['inceptionEnd'] =  $request->get('ins_endDate');
         $form['endStart'] =        $request->get('end_startDate');
         $form['endEnddate'] =       $request->get('end_endDate');
         $form['customerId'] =       $request->get('customerId');
         $form['status'] =    ($request->has('post_status'))  ?  $request->get('post_status'):'';
         
         $form['inceptioncheck'] =   ($request->has('inceptioncheck'))  ?  $request->get('inceptioncheck'):'';
         
         $form['enddatecheck'] =   ($request->has('enddatecheck'))  ?  $request->get('enddatecheck'):''; 
        

         if($form['customerId'] >0) {
          $customerDetails = DB::table('customers')->where('id',$form['customerId'])->select('name')->first();
             $form['customerName'] = $customerDetails->name;   
         }
       
        if($request->get('search') =='') {
          $form['customerId']=0;  
        }
        
        $filteredResult = $filterObj->getProductionRequest($request, 'postpolicyrequest_');
        $endorsementDetails = $filterObj->getPostEndorsementRequest($request, 'postendorsementrequest_');

        $statusArray = array('0' => 'Policy', '1' => 'Endorsement');

        $poststatusArray = array(1 => 'Waiting for approval', 2 => 'Approved',3=>"Rejected");
        $data = array('statusArray' => $statusArray, "productionDetails" => $filteredResult, 'endorsementDetails' => $endorsementDetails, 'poststatusArray' => $poststatusArray,'formData'=>$form);

        return view('Reports/postrequest', $data);
    }

    /**
     * 
     */
    public function postrequestExport() {

        $filterObj = new FinanceFiltter();
        $request = array();
        $filteredResult = $filterObj->getProductionRequest($request, 'postpolicyrequest_', true);
        $endorsementDetails = $filterObj->getPostEndorsementRequest($request, 'postendorsementrequest_', true);

        $requestArray[] = array('Policy no:', 'Validity', 'Customer', 'Issue date', 'Amount', 'Vat');
        $endorsementArray[] = array('Policy no:', 'Endorsement number', 'Validity', 'Customer', 'Issue date', 'Amount', 'Vat','Status','Reason');



        foreach ($filteredResult as $result) {
            $requestArray [] = array(
                'Policy no:' => $result->policy_number,
                'Validity' => (date('d-m-Y', strtotime($result->inceptiondate))) . '-' . (date('d-m-Y', strtotime($result->expirydate))),
                'Customer' => $result->customerName,
                'Issue date' => date('d-m-Y', strtotime($result->policyissuedate)),
                'Amount' => number_format(round(floatval($result->premiumAmount), 2),2),
                'Vat' => number_format(round(floatval($result->policyvatAmount), 2),2)
            );
        }

        foreach ($endorsementDetails as $result) {
            $endorsementArray [] = array(
                'Policy no:' => $result->policy_number,
                'Endorsement number' => ($result->endorsement_number != '') ? $result->endorsement_number : '',
                'Validity' => (date('d-m-Y', strtotime($result->endorsementStart))) . '-' . (date('d-m-Y', strtotime($result->expirydate))),
                'Customer' => $result->customerName,
                'Issue date' => date('d-m-Y', strtotime($result->endorsementIssuedate)),
                'Amount' => number_format(round(floatval($result->premiumAmount), 2),2),
                'Vat' => number_format(round(floatval($result->endorsementvatAmount), 2),2),
                "Status" =>$result->endorsementStatus,
                "Reason" =>$result->reject_reason
            );
        }



        Excel::create('postrequestdata_' . date('Ymdhis'), function($excel) use ($requestArray, $endorsementArray) {
            $excel->setTitle('Post request details');
            $excel->sheet('Policies', function($sheet) use ($requestArray) {
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

            //Renewal sheet creation area
            $excel->sheet('Endorsement', function($sheet) use ($endorsementArray) {
                $sheet->fromArray($endorsementArray, null, 'A1', false, false);
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

}
