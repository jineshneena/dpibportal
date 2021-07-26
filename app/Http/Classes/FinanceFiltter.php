<?php

namespace App\Http\Classes;

use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Illuminate\Support\Carbon;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequestFiltter
 *
 * @author j.mani
 */
class FinanceFiltter {

    /**
     * 
     * @param type $request
     * @param type $filterflag
     * @return type
     */
    public function getFinanceRequest($request, $filterflag = false) {

        $invoiceDetails = DB::table('policy_invoice as iv')
                ->join('policies as p', 'p.id', '=', 'iv.policy_id')
                ->leftJoin('customers as c', 'c.id', '=', 'p.customer_id')
                ->leftJoin('policy_invoice_payment as ip', 'ip.invoice_id', 'iv.id')
                ->select('iv.*', 'ip.payment_date as paymentDate', 'p.*', 'c.*', DB::raw("(select management_type from invoice_bebt_management as dbm where dbm.invoice_id=iv.id order by dbm.id desc limit 1) AS lastAction"), DB::raw("(select dbm.created_date from invoice_bebt_management as dbm where dbm.invoice_id=iv.id order by dbm.id desc limit 1) AS lastactionDate"), DB::raw("(select dbm.info from invoice_bebt_management as dbm where dbm.invoice_id=iv.id order by dbm.id desc limit 1) AS remarks"), DB::raw("(case iv.paid_status when '0' then 'Invoice Created' when '1' then 'Paid'  end) AS invoiceStatusString"), 'p.customer_id as customerId', 'iv.id as invoiceId');



        if ($filterflag) {
            $conditionFilter = json_decode(Session::get('invoicefilter_' . Auth::user()->id), true);
            $requestObj = $this->generateQuery($conditionFilter, $invoiceDetails);
            $resultArray = $requestObj->orderBy('iv.generated_date', 'asc')->get();
        } else {
            $whereArray = [];
            $sessionWhereCondition = [];
            if ($request->get('startDate') != '' && $request->get('endDate') != '') {
                $invoiceDetails->whereBetween('iv.invoice_due_date', [$request->get('startDate'), $request->get('endDate')]);
                $sessionWhereCondition['betweenCondition']['iv.invoice_due_date'][] = $request->get('startDate');
                $sessionWhereCondition['betweenCondition']['iv.invoice_due_date'][] = $request->get('endDate');
            } elseif ($request->get('startDate') != '') {
                $whereArray[] = ['iv.invoice_due_date', '=', $request->get('startDate')];
            } elseif ($request->get('endDate') != '') {
                $whereArray[] = ['iv.invoice_due_date', '=', $request->get('endDate')];
            } else {
                
            }

            if ($request->get('customerId') > 0) {
                $whereArray[] = ['p.customer_id', '=', $request->get('customerId')];
            }
            if ($request->get('invoice_status') != '') {
                $status = json_decode($request->get('invoice_status'));
                if (is_array($status)) {
                    $invoiceDetails->whereIn('iv.paid_status', $status);
                    $sessionWhereCondition['inCondition']['iv.paid_status'] = json_encode($status);
                } else {
                    $whereArray[] = ['iv.paid_status', $status];
                }
            }
            if (count($whereArray) > 0) {
                $invoiceDetails->where($whereArray);
                $sessionWhereCondition['whereCondition'] = json_encode($whereArray);
            }
            Session::put('invoicefilter_' . Auth::user()->id, json_encode($sessionWhereCondition));

            $resultArray = $invoiceDetails->orderBy('iv.generated_date', 'asc')->get();
        }


        return $resultArray;
    }

    /**
     * 
     * @param type $conditionFilter
     * @param type $quoteRequest
     * @return type
     */
    private function generateQuery($conditionFilter, $quoteRequest) {

        if (count($conditionFilter) > 0) {
            foreach ($conditionFilter as $key => $conditionval) {
                switch ($key) {
                    case 'betweenCondition':
                        foreach ($conditionval as $betKey => $betVal) {
                            $quoteRequest->whereBetween($betKey, [$betVal[0], $betVal[1]]);
                        }

                        break;
                    case 'inCondition':
                        foreach ($conditionval as $inKey => $inVal) {
                            $quoteRequest->whereIn($inKey, json_decode($inVal));
                        }

                        break;
                    case 'wheredate':
                        $quoteRequest->whereDate(json_decode($conditionval));
                        break;
                    case 'whereraw':
                       
                        $quoteRequest->whereRaw($conditionval);
                        break;    

                    default:
                        $quoteRequest->where(json_decode($conditionval));
                }
            }
        }
        return $quoteRequest;
    }

    /**
     * 
     * @param type $request
     * @param type $filterflag
     * @return type
     */
    public function getEndorsementRequest($request, $sessionName, $filterflag = false) {


        $productionDetails = DB::table('policy_intallment as im')
               
                ->join('policy_endorsement as pe', function($ejoin) {
                    $ejoin->on('pe.id', '=', 'im.endorsement_id');
                    $ejoin->where('pe.endorsement_status', 2);
                })

                ->join('policies as p', function($join) {
                    $join->on('im.policy_id', '=', 'p.id');
                    $join->whereIn('p.policy_status', [ 2, 4, 5]);
                })
                ->join('customers as c', 'c.id', '=', 'p.customer_id')
                ->leftJoin('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                ->leftJoin('insurance_product as ip', 'ip.id', '=', 'p.product_id')
                ->leftJoin('policy_commission as pc', function($leftjoin) {
                    $leftjoin->on('pc.installment_id', '=', 'im.id');
                    $leftjoin->where('pc.distributor_type', '=', 'sales person');
                })
                ->select('p.*', DB::raw('SUM(im.amount) as premiumAmount'), 'pe.*', 'ins.insurer_name', 'p.id as mainId', 'c.name as customerName', 'p.end_date as expirydate', 'pe.start_date as endorsementStart', DB::raw('SUM(im.vat_amount) as endorsementvatAmount'), 'pe.issue_date as endorsementIssuedate', 'ip.product_name', 'im.due_date as endorsementDuedate', 'c.id_code as idCode', DB::raw("(case p.policy_type  when '3' then 'Motor' when '2' then 'Medical' else 'General'  end) AS policyType"), DB::raw("(case im.collect_by  when '1' then 'Broker' when '2' then 'Insurer'  when '3' then 'Retailer' else 'premium financier'  end) AS collectionType"), DB::raw('(select u.name from policy_commission pc join users u on u.id = pc.sales_person_id where pc.policy_id=p.id and pc.distributor_type="sales person" limit 1) AS salesPerson'), DB::raw("(case pe.endorsement_status  when '3' then 'Rejectd' when '2' then 'Approved' else 'Waiting for approval'  end) AS endorsementStatus"), 'pe.reject_reason', 'pc.percentage as salesCommission', 'pc.amount as salesCommissionamount','pe.issue_date as endorsementissue')
                ->where('im.installment_type', '=', 2);




        if ($filterflag) {
            $conditionFilter = json_decode(Session::get($sessionName . Auth::user()->id), true);
            $requestObj = $this->generateQuery($conditionFilter, $productionDetails);
            $resultArray = $requestObj->groupBy('pe.id')->orderBy('pe.created_at')->get();
        } else {
            $whereArray = [];

            $sessionWhereCondition = [];


            if ($request->get('duedatecheck')) {
                if ($request->get('ins_startDate') != '' && $request->get('ins_endDate') != '') {
                    $productionDetails->whereBetween('pe.issue_date', [$request->get('ins_startDate'), $request->get('ins_endDate')]);
                    $sessionWhereCondition['betweenCondition']['pe.issue_date'][] = $request->get('ins_startDate');
                    $sessionWhereCondition['betweenCondition']['pe.issue_date'][] = $request->get('ins_endDate');
                } elseif ($request->get('ins_startDate') != '') {
                    $whereArray[] = ['pe.issue_date', '=', $request->get('ins_startDate')];
                } elseif ($request->get('ins_endDate') != '') {
                    $whereArray[] = ['pe.issue_date', '=', $request->get('ins_endDate')];
                } else {
                    
                }
            }



//END DATE SETTING
            if ($request->get('enddatecheck')) {
                if ($request->get('end_startDate') != '' && $request->get('end_endDate') != '') {
                    $productionDetails->whereBetween('p.end_date', [$request->get('end_startDate'), $request->get('end_endDate')]);
                    $sessionWhereCondition['betweenCondition']['p.end_date'][] = $request->get('end_startDate');
                    $sessionWhereCondition['betweenCondition']['p.end_date'][] = $request->get('end_endDate');
                } elseif ($request->get('end_startDate') != '') {
                    $whereArray[] = ['im.end_date', '=', $request->get('end_startDate')];
                } elseif ($request->get('end_endDate') != '') {
                    $whereArray[] = ['im.end_date', '=', $request->get('end_endDate')];
                } else {
                    
                }
            }
            //INCEPTION DATE
            if ($request->get('inceptioncheck')) {
                if ($request->get('startdate') != '' && $request->get('enddate') != '') {
                    $productionDetails->whereBetween('im.start_date', [$request->get('startdate'), $request->get('enddate')]);
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('startdate');
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('enddate');
                } elseif ($request->get('startdate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('startdate')];
                } elseif ($request->get('enddate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('enddate')];
                } else {
                    
                }
            }




            if ($request->get('customerId') > 0) {
                $whereArray[] = ['p.customer_id', '=', $request->get('customerId')];
            }
            if ($request->has('post_status') && $request->get('post_status') != '') {
                $whereArray[] = ['pe.endorsement_status', '=', $request->get('post_status')];
            }
            if ($request->has('insurer') && $request->get('insurer') != '') {
                $whereArray[] = ['p.insurer_id', '=', $request->get('insurer')];
            }
            if ($request->has('salesperson') && $request->get('salesperson') != '') {
                $whereArray[] = ['pc.sales_person_id', '=', $request->get('salesperson')];
            }
            if ($request->has('product') && $request->get('product') != '') {
                $whereArray[] = ['p.product_id', '=', $request->get('product')];
            }
            
            if (count($whereArray) > 0) {
                $productionDetails->where($whereArray);
                $sessionWhereCondition['whereCondition'] = json_encode($whereArray);
            }
            Session::put($sessionName . Auth::user()->id, json_encode($sessionWhereCondition));



            $resultArray = $productionDetails->groupBy('pe.id')->orderBy('p.id')->get();
            // dd($productionDetails->toSql(),$productionDetails->getBindings());
        }

        return $resultArray;
    }

    /**
     * 
     * @param type $request
     * @param type $filterflag
     * @return type
     */
    public function getProductionRequest($request, $sessionName, $filterflag = false) {

        $productionDetails = DB::table('policy_intallment as im')
                ->join('policies as p', function($join) {
                    $join->on('im.policy_id', '=', 'p.id');
                    $join->whereIn('p.policy_status', [ 2, 4, 5]);
                })
                ->join('customers as c', 'c.id', '=', 'p.customer_id')
                ->leftJoin('policy_commission as pc', function($leftjoin) {
                    $leftjoin->on('pc.installment_id', '=', 'im.id');
                    $leftjoin->where('pc.distributor_type', '=', 'sales person');
                })
                ->leftJoin('insurance_product as ip', 'ip.id', '=', 'p.product_id')
                ->leftJoin('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                ->select('p.*', DB::raw('im.amount as premiumAmount'), 'ins.insurer_name', 'p.id as mainId', 'c.name as customerName', 'p.end_date as expirydate', 'p.start_date as inceptiondate', DB::raw('im.vat_amount as policyvatAmount'), 'p.issue_date as policyissuedate', 'im.due_date as endorsementDuedate', 'c.id_code as idCode', DB::raw("(case p.policy_type  when '3' then 'Motor' when '2' then 'Medical' else 'General'  end) AS policyType"), 'ip.product_name as productName', DB::raw("(case im.collect_by  when '1' then 'Broker' when '2' then 'Insurer'  when '3' then 'Retailer' else 'premium financier'  end) AS collectionType"), DB::raw('(select u.name from policy_commission pc join users u on u.id = pc.sales_person_id where pc.policy_id=p.id and pc.distributor_type="sales person" limit 1) AS salesPerson'), 'pc.percentage as salesCommission', 'pc.amount as salesCommissionamount')
                ->where('im.installment_type', '=', 1);



        if ($filterflag) {
            $conditionFilter = json_decode(Session::get($sessionName . Auth::user()->id), true);
            $requestObj = $this->generateQuery($conditionFilter, $productionDetails);

            //dd($requestObj->toSql(),$requestObj->getBindings());

            $resultArray = $requestObj->orderBy('p.id')->get();
        } else {
            $whereArray = [];

            $sessionWhereCondition = [];

            if ($request->get('duedatecheck')) {
                if ($request->get('ins_startDate') != '' && $request->get('ins_endDate') != '') {
                    $productionDetails->whereBetween('p.issue_date', [$request->get('ins_startDate'), $request->get('ins_endDate')]);
                    $sessionWhereCondition['betweenCondition']['p.issue_date'][] = $request->get('ins_startDate');
                    $sessionWhereCondition['betweenCondition']['p.issue_date'][] = $request->get('ins_endDate');
                } elseif ($request->get('ins_startDate') != '') {
                    $whereArray[] = ['p.issue_date', '=', $request->get('ins_startDate')];
                } elseif ($request->get('ins_endDate') != '') {
                    $whereArray[] = ['p.issue_date', '=', $request->get('ins_endDate')];
                } else {
                    
                }
            }



//END DATE SETTING
            if ($request->get('enddatecheck')) {
                if ($request->get('end_startDate') != '' && $request->get('end_endDate') != '') {
                    $productionDetails->whereBetween('p.end_date', [$request->get('end_startDate'), $request->get('end_endDate')]);
                    $sessionWhereCondition['betweenCondition']['p.end_date'][] = $request->get('end_startDate');
                    $sessionWhereCondition['betweenCondition']['p.end_date'][] = $request->get('end_endDate');
                } elseif ($request->get('end_startDate') != '') {
                    $whereArray[] = ['p.end_date', '=', $request->get('end_startDate')];
                } elseif ($request->get('end_endDate') != '') {
                    $whereArray[] = ['p.end_date', '=', $request->get('end_endDate')];
                } else {
                    
                }
            }
            //INCEPTION DATE
            if ($request->get('inceptioncheck')) {
                if ($request->get('startdate') != '' && $request->get('enddate') != '') {
                    $productionDetails->whereBetween('im.start_date', [$request->get('startdate'), $request->get('enddate')]);
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('startdate');
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('enddate');
                } elseif ($request->get('startdate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('startdate')];
                } elseif ($request->get('enddate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('enddate')];
                } else {
                    
                }
            }


            if ($request->get('customerId') > 0) {
                $whereArray[] = ['p.customer_id', '=', $request->get('customerId')];
            }
            if ($request->has('post_status') && $request->get('post_status') != '') {
                $whereArray[] = ['p.policy_status', '=', $request->get('post_status')];
            }
            if ($request->has('insurer') && $request->get('insurer') != '') {
                $whereArray[] = ['p.insurer_id', '=', $request->get('insurer')];
            }

            if ($request->has('salesperson') && $request->get('salesperson') != '') {
                $whereArray[] = ['pc.sales_person_id', '=', $request->get('salesperson')];
            }
            if ($request->has('product') && $request->get('product') != '') {
                $whereArray[] = ['p.product_id', '=', $request->get('product')];
            }

            if (count($whereArray) > 0) {
                $productionDetails->where($whereArray);
                $sessionWhereCondition['whereCondition'] = json_encode($whereArray);
            }
            Session::put($sessionName . Auth::user()->id, json_encode($sessionWhereCondition));



            $resultArray = $productionDetails->orderBy('p.id')->get();

           // dd($productionDetails->toSql(),$productionDetails->getBindings());
        }




        return $resultArray;
    }

    /**
     * 
     * @param type $request
     * @param type $filterflag
     * @return type
     */
   public function getInstallmentRequest($request, $filterflag = false) {

        $installmentDetails = DB::table('policy_intallment as im')
                ->join('policies as p', function($join) {
                    $join->on('im.policy_id', '=', 'p.id');
                    $join->whereIn('p.policy_status', [2, 4, 5]);
                })
                ->join('customers as c', 'c.id', '=', 'p.customer_id')
                ->leftJoin('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                ->leftJoin('insurance_product', 'insurance_product.id', '=', 'p.product_id')
                ->select('p.*', 'ins.insurer_name', 'p.id as mainId', 'c.name as customerName', 'p.end_date as expirydate', 'p.start_date as inceptiondate', 'p.issue_date as policyissuedate', 'im.end_date as instEnddate', 'im.due_date as instDuedate', 'im.amount as instAmount', 'im.vat_amount as instVatamount', 'im.vat_percentage as instvatpercentage', 'im.paid_status as instPaidstatus','insurance_product.product_name','im.id as insId')
                ->where('im.installment_type', '=', 1);






        if ($filterflag) {
            $conditionFilter = json_decode(Session::get('financeinstallment_' . Auth::user()->id), true);
            $requestObj = $this->generateQuery($conditionFilter, $installmentDetails);
            $resultArray = $requestObj->orderBy('im.due_date')->get();
        } else {
            $whereArray = [];
        
            $sessionWhereCondition = [];
            if ($request->get('intallment_type') !== null && $request->get('intallment_type') == 0) {
                $whereArray[] = ['im.paid_status', '=', 0];
            }
            if ($request->get('intallment_type') == 1) {
                $whereArray[] = ['im.paid_status', '=', $request->get('intallment_type')];
            }


            if ($request->get('startDate') != '' && $request->get('endDate') != '') {
                $installmentDetails->whereBetween('im.due_date', [date('Y-m-d',strtotime($request->get('startDate'))), date('Y-m-d',strtotime($request->get('endDate')))]);
                $sessionWhereCondition['betweenCondition']['im.due_date'][] = date('Y-m-d',strtotime($request->get('startDate')));
                $sessionWhereCondition['betweenCondition']['im.due_date'][] = date('Y-m-d',strtotime($request->get('endDate')));
            } elseif ($request->get('startDate') != '') {
                $whereArray[] = ['im.due_date', '=', date('Y-m-d',strtotime($request->get('startDate')))];
            } elseif ($request->get('endDate') != '') {
                $whereArray[] = ['im.due_date', '=', date('Y-m-d',strtotime($request->get('endDate')))];
            } else {
                
            }


            if ($request->get('customerId') > 0) {
                $whereArray[] = ['p.customer_id', '=', $request->get('customerId')];
            }
            if ($request->has('policy_type') && $request->get('policy_type') != '') {
                $whereArray[] = ['p.policy_type', '=', $request->get('policy_type')];
            }
            if ($request->has('insurer') && $request->get('insurer') != '') {
                $whereArray[] = ['p.insurer_id', '=', $request->get('insurer')];
            }

            if (count($whereArray) > 0) {
                $installmentDetails->where($whereArray);
                $sessionWhereCondition['whereCondition'] = json_encode($whereArray);
            }
            Session::put('financeinstallment_' . Auth::user()->id, json_encode($sessionWhereCondition));

            $resultArray = $installmentDetails->orderBy('im.start_date')->get();
        }



        return $resultArray;
    }

    /**
     * 
     * @param type $request
     * @param type $filterflag
     * @return type
     */
    public function getAllInstallmentDetails($request, $sessionName, $filterflag = false) {


        $productionDetails = DB::table('policy_intallment as im')
                ->join('policies as p', function($join) {
                    $join->on('im.policy_id', '=', 'p.id');
                    $join->whereIn('p.policy_status', [ 2, 4, 5]);
                })
                ->leftJoin('policy_endorsement as pe',function($leftjoin){
                         $leftjoin->on('pe.id', '=', 'im.endorsement_id');                    
                    $leftjoin->whereIn('im.installment_type', [1, 2]);
                    
                }) 
                
                ->join('customers as c', 'c.id', '=', 'p.customer_id')
                ->leftJoin('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                ->leftJoin('insurance_product as ip', 'ip.id', '=', 'p.product_id')
                ->leftJoin('policy_commission as pc', function($leftjoin) {
                    $leftjoin->on('pc.installment_id', '=', 'im.id');
                    $leftjoin->where('pc.distributor_type', '=', 'sales person');
                })
                ->select('p.*',  DB::raw("if(`im`.`installment_type`=1,p.issue_date,pe.issue_date) as ppeIssue"),'pe.id as endorsementId', 'im.amount as premiumAmount', 'pe.*', 'ins.insurer_name', 'p.id as mainId', 'c.name as customerName', 'p.end_date as expirydate', 'pe.start_date as endorsementStart', 'p.start_date as policyStart', 'im.vat_amount as vatAmount', 'pe.issue_date as endorsementIssuedate', 'ip.product_name', 'im.due_date as dueDate', 'c.id_code as idCode', DB::raw("(case p.policy_type  when '3' then 'Motor' when '2' then 'Medical' else 'General'  end) AS policyType"), DB::raw("(case im.collect_by  when '1' then 'Broker' when '2' then 'Insurer'  when '3' then 'Retailer' else 'premium financier'  end) AS collectionType"), DB::raw('(select u.name from policy_commission pc join users u on u.id = pc.sales_person_id where pc.policy_id=p.id and pc.distributor_type="sales person" limit 1) AS salesPerson'), 'pc.percentage as salesCommission', 'pc.amount as salesCommissionamount', 'im.start_date as beginDate','im.installment_type as insType')
                
                ->whereRaw('(pe.endorsement_status=2 or pe.endorsement_status is null)');



        if ($filterflag) {
            $conditionFilter = json_decode(Session::get($sessionName . Auth::user()->id), true);
            $requestObj = $this->generateQuery($conditionFilter, $productionDetails);
      
//dd($requestObj->toSql(),$requestObj->getBindings());
            $resultArray = $requestObj->orderBy('im.due_date')->get();
        } else {
            $whereArray = [];

            $sessionWhereCondition = [];


            if ($request->get('duedatecheck')) {
                if ($request->get('ins_startDate') != '' && $request->get('ins_endDate') != '') {
                     $productionDetails->whereBetween(DB::raw("if(im.installment_type=1,p.issue_date,pe.issue_date)"), [$request->get('ins_startDate'), $request->get('ins_endDate')]);               
                    
                     $keystring = 'if(im.installment_type=1,p.issue_date,pe.issue_date) between "'.$request->get("ins_startDate").'" and "'.$request->get("ins_endDate").'"';
                    // $sessionWhereCondition['betweenCondition'][$keystring][] = $request->get('ins_startDate');
                    // $sessionWhereCondition['betweenCondition'][$keystring][] = $request->get('ins_endDate');
                     $sessionWhereCondition['whereraw'] = $keystring;
                } elseif ($request->get('ins_startDate') != '') {
                    $whereArray[] = ['p.issue_date', '=', $request->get('ins_startDate')];
                } elseif ($request->get('ins_endDate') != '') {
                    $whereArray[] = ['p.issue_date', '=', $request->get('ins_endDate')];
                } else {
                    
                }
            }



//END DATE SETTING
            if ($request->get('enddatecheck')) {
                if ($request->get('end_startDate') != '' && $request->get('end_endDate') != '') {
                    $productionDetails->whereBetween('p.end_date', [$request->get('end_startDate'), $request->get('end_endDate')]);
                    $sessionWhereCondition['betweenCondition']['p.end_date'][] = $request->get('end_startDate');
                    $sessionWhereCondition['betweenCondition']['p.end_date'][] = $request->get('end_endDate');
                } elseif ($request->get('end_startDate') != '') {
                    $whereArray[] = ['im.end_date', '=', $request->get('end_startDate')];
                } elseif ($request->get('end_endDate') != '') {
                    $whereArray[] = ['im.end_date', '=', $request->get('end_endDate')];
                } else {
                    
                }
            }
            //INCEPTION DATE
            if ($request->get('inceptioncheck')) {
                if ($request->get('startdate') != '' && $request->get('enddate') != '') {
                    $productionDetails->whereBetween('im.start_date', [$request->get('startdate'), $request->get('enddate')]);
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('startdate');
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('enddate');
                } elseif ($request->get('startdate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('startdate')];
                } elseif ($request->get('enddate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('enddate')];
                } else {
                    
                }
            }





            if ($request->get('customerId') > 0) {
                $whereArray[] = ['p.customer_id', '=', $request->get('customerId')];
            }
            if ($request->has('post_status') && $request->get('post_status') != '') {
                $whereArray[] = ['pe.endorsement_status', '=', $request->get('post_status')];
            }
            if ($request->has('insurer') && $request->get('insurer') != '') {
                $whereArray[] = ['p.insurer_id', '=', $request->get('insurer')];
            }
            
            if ($request->has('salesperson') && $request->get('salesperson') != '') {
                $whereArray[] = ['pc.sales_person_id', '=', $request->get('salesperson')];
            }
            if ($request->has('product') && $request->get('product') != '') {
                $whereArray[] = ['p.product_id', '=', $request->get('product')];
            }

            if (count($whereArray) > 0) {
                $productionDetails->where($whereArray);
                $sessionWhereCondition['whereCondition'] = json_encode($whereArray);
            }
            Session::put($sessionName . Auth::user()->id, json_encode($sessionWhereCondition));
//dd($sessionWhereCondition);

//dd($productionDetails->toSql(),$productionDetails->getBindings());
            $resultArray = $productionDetails->orderBy('p.id')->get();
            //dd($productionDetails->toSql(),$productionDetails->getBindings());
        }

        return $resultArray;
    }
    /**
     * 
     * @param type $request
     * @param type $filterflag
     * @return type
     */
    public function getPostEndorsementRequest($request, $sessionName, $filterflag = false) {


        $productionDetails = DB::table('policy_intallment as im')
               
                ->join('policy_endorsement as pe', function($ejoin) {
                    $ejoin->on('pe.id', '=', 'im.endorsement_id');
                   
                })

                ->join('policies as p', function($join) {
                    $join->on('im.policy_id', '=', 'p.id');
                    $join->whereIn('p.policy_status', [ 2, 4, 5]);
                })
                ->join('customers as c', 'c.id', '=', 'p.customer_id')
                ->leftJoin('insurer_details as ins', 'ins.id', '=', 'p.insurer_id')
                ->leftJoin('insurance_product as ip', 'ip.id', '=', 'p.product_id')
                ->leftJoin('policy_commission as pc', function($leftjoin) {
                    $leftjoin->on('pc.installment_id', '=', 'im.id');
                    $leftjoin->where('pc.distributor_type', '=', 'sales person');
                })
                ->select('p.*', DB::raw('SUM(im.amount) as premiumAmount'), 'pe.*', 'ins.insurer_name', 'p.id as mainId', 'c.name as customerName', 'p.end_date as expirydate', 'pe.start_date as endorsementStart', DB::raw('SUM(im.vat_amount) as endorsementvatAmount'), 'pe.issue_date as endorsementIssuedate', 'ip.product_name', 'im.due_date as endorsementDuedate', 'c.id_code as idCode', DB::raw("(case p.policy_type  when '3' then 'Motor' when '2' then 'Medical' else 'General'  end) AS policyType"), DB::raw("(case im.collect_by  when '1' then 'Broker' when '2' then 'Insurer'  when '3' then 'Retailer' else 'premium financier'  end) AS collectionType"), DB::raw('(select u.name from policy_commission pc join users u on u.id = pc.sales_person_id where pc.policy_id=p.id and pc.distributor_type="sales person" limit 1) AS salesPerson'), DB::raw("(case pe.endorsement_status  when '3' then 'Rejectd' when '2' then 'Approved' else 'Waiting for approval'  end) AS endorsementStatus"), 'pe.reject_reason', 'pc.percentage as salesCommission', 'pc.amount as salesCommissionamount','pe.issue_date as endorsementissue')
                ->where('im.installment_type', '=', 2);




        if ($filterflag) {
            $conditionFilter = json_decode(Session::get($sessionName . Auth::user()->id), true);
            $requestObj = $this->generateQuery($conditionFilter, $productionDetails);
            $resultArray = $requestObj->groupBy('pe.id')->orderBy('pe.created_at')->get();
        } else {
            $whereArray = [];

            $sessionWhereCondition = [];


            if ($request->get('duedatecheck')) {
                if ($request->get('ins_startDate') != '' && $request->get('ins_endDate') != '') {
                    $productionDetails->whereBetween('pe.issue_date', [$request->get('ins_startDate'), $request->get('ins_endDate')]);
                    $sessionWhereCondition['betweenCondition']['pe.issue_date'][] = $request->get('ins_startDate');
                    $sessionWhereCondition['betweenCondition']['pe.issue_date'][] = $request->get('ins_endDate');
                } elseif ($request->get('ins_startDate') != '') {
                    $whereArray[] = ['pe.issue_date', '=', $request->get('ins_startDate')];
                } elseif ($request->get('ins_endDate') != '') {
                    $whereArray[] = ['pe.issue_date', '=', $request->get('ins_endDate')];
                } else {
                    
                }
            }



//END DATE SETTING
            if ($request->get('enddatecheck')) {
                if ($request->get('end_startDate') != '' && $request->get('end_endDate') != '') {
                    $productionDetails->whereBetween('p.end_date', [$request->get('end_startDate'), $request->get('end_endDate')]);
                    $sessionWhereCondition['betweenCondition']['im.end_date'][] = $request->get('end_startDate');
                    $sessionWhereCondition['betweenCondition']['im.end_date'][] = $request->get('end_endDate');
                } elseif ($request->get('end_startDate') != '') {
                    $whereArray[] = ['im.end_date', '=', $request->get('end_startDate')];
                } elseif ($request->get('end_endDate') != '') {
                    $whereArray[] = ['im.end_date', '=', $request->get('end_endDate')];
                } else {
                    
                }
            }
            //INCEPTION DATE
            if ($request->get('inceptioncheck')) {
                if ($request->get('startdate') != '' && $request->get('enddate') != '') {
                    $productionDetails->whereBetween('im.start_date', [$request->get('startdate'), $request->get('enddate')]);
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('startdate');
                    $sessionWhereCondition['betweenCondition']['im.start_date'][] = $request->get('enddate');
                } elseif ($request->get('startdate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('startdate')];
                } elseif ($request->get('enddate') != '') {
                    $whereArray[] = ['im.start_date', '=', $request->get('enddate')];
                } else {
                    
                }
            }




            if ($request->get('customerId') > 0) {
                $whereArray[] = ['p.customer_id', '=', $request->get('customerId')];
            }
            if ($request->has('post_status') && $request->get('post_status') != '') {
                $whereArray[] = ['pe.endorsement_status', '=', $request->get('post_status')];
            }
            if ($request->has('insurer') && $request->get('insurer') != '') {
                $whereArray[] = ['p.insurer_id', '=', $request->get('insurer')];
            }
            if ($request->has('salesperson') && $request->get('salesperson') != '') {
                $whereArray[] = ['pc.sales_person_id', '=', $request->get('salesperson')];
            }
            if ($request->has('product') && $request->get('product') != '') {
                $whereArray[] = ['p.product_id', '=', $request->get('product')];
            }
            
            if (count($whereArray) > 0) {
                $productionDetails->where($whereArray);
                $sessionWhereCondition['whereCondition'] = json_encode($whereArray);
            }
            Session::put($sessionName . Auth::user()->id, json_encode($sessionWhereCondition));



            $resultArray = $productionDetails->groupBy('pe.id')->orderBy('pe.created_at')->get();
            // dd($productionDetails->toSql(),$productionDetails->getBindings());
        }

        return $resultArray;
    }

}
