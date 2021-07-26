<?php

namespace App\Http\Controllers\Timeline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Controllers\Controller;
use Excel;
use Session;

class TimelineController extends Controller {

    public function getTimelinedetails($policyId) {

        $timelineArray = $this->policyDetails($policyId);
        
        $data = array('timelines' => $timelineArray,'policyId'=>$policyId);
        
        $returnHTML = view('Timeline/index', $data)->render();

        return response()->json(array('status' => true, 'content' => $returnHTML));
    }

    /**
     * 
     * @param type $policyId
     */
    public function downloadTimelinedetails($policyId) {

        $timelineArray = $this->policyDetails($policyId);
        $requestArray[] = array('Policy number','Type', 'Policy start date', 'Policy end date', 'Installment due date', 'Schedule date', 'Description', 'Installment amount', 'Vat amount');

        foreach($timelineArray as $key =>$timeline) {
            
        foreach($timeline as $details) {
            if ($details['type'] == 1 ) {
               $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                'Type' =>'Policy',   
                'Policy start date' =>( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Policy end date' =>  '',
                'Installment due date' =>  '',
                'Schedule date' =>  '',
                'Description' => 'Policy was started',
                'Installment amount' => '',
                'Vat amount' => '',
                
            );     
            } else if($details['type'] == 2) {
                $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                'Type' =>'Installment',   
                'Policy start date' => '',
                'Policy end date' => '',
                'Installment due date' => ( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Schedule date' => '',
                'Description' => 'Installment due date',
                'Installment amount' => round(floatval($details["amount"]), 2),
                'Vat amount' => round(floatval($details["vatAmount"]), 2)
                
            );    
            } else if($details['type'] == 3) {
                $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                'Type' =>'Schedule',   
                'Policy start date' => '',
                'Policy end date' => '',
                'Installment due date' => '',
                'Schedule date' => ( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Description' => $details['description'],
                'Installment amount' => '',
                'Vat amount' => '',
                
            );    
            }
            
            else {
                 $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                 'Type' =>'Policy',       
                'Policy start date' => '',
                'Policy end date' => ( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Installment due date' => '',
                'Schedule date' => '',
                'Description' => 'Policy end date',
                'Installment amount' => '',
                'Vat amount' => '',
                
            );   
            }
          
            
        }
        }
        
     

        Excel::create('timelinedata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Policy timeline details');
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

    /**
     * 
     * @param type $policyId
     * @return type
     */
    private function policyDetails($policyId) {
        //Policy details

        $policyDetails = DB::table('policies')
                ->select('start_date', 'end_date', 'gross_amount', 'policy_number', 'installment_number', 'gross_amount', 'issue_date')
                ->where('id', $policyId)
                ->first();

        //InstallmentDetails
        $installmentDetails = DB::table('policy_intallment')
                ->join('policies', 'policies.id', '=', 'policy_intallment.policy_id')
                ->select('policy_intallment.due_date', 'policy_intallment.amount', 'policy_intallment.vat_amount', 'policy_intallment.installment_number','policies.policy_number')                
                ->where('policy_intallment.policy_id', $policyId)
                ->where('policy_intallment.installment_type', 1)
                ->orderBy('policy_intallment.due_date')
                ->get();

        //Policyschedule details

        $scheduleDetails = DB::table('policy_schedule')
                ->join('policies', 'policies.id', '=', 'policy_schedule.policy_id')
                ->select('policy_schedule.start_date', 'policy_schedule.active_status', 'policy_schedule.description', 'policies.policy_number')
                ->where('policy_schedule.policy_id', $policyId)
                ->where('policy_schedule.active_status', 1)
                ->orderBy('policy_schedule.start_date')
                ->get();

        $timelineArray = array();
        $timelineArray[date('Ymd', strtotime($policyDetails->start_date))][] = array('startDate' => $policyDetails->start_date, 'policyNumber' => $policyDetails->policy_number, 'type' => 1, 'installmentNumber' => $policyDetails->installment_number, 'issueDate' => $policyDetails->issue_date);
        $timelineArray[date('Ymd', strtotime($policyDetails->end_date))][] = array('startDate' => $policyDetails->end_date, 'policyNumber' => $policyDetails->policy_number, 'type' => 4, 'installmentNumber' => $policyDetails->installment_number);
        //Iterate installment details
        if (count($installmentDetails) > 0) {

            foreach ($installmentDetails as $insDetail) {
                $timelineArray[date('Ymd', strtotime($insDetail->due_date))][] = array('startDate' => $insDetail->due_date, 'amount' => $insDetail->amount, 'vatAmount' => $insDetail->vat_amount, 'type' => 2, 'installment' => $insDetail->installment_number,'policyNumber' => $policyDetails->policy_number);
            }
        }

        // Iterate schedule details

        if (count($scheduleDetails) > 0) {

            foreach ($scheduleDetails as $schedule) {
                $timelineArray[date('Ymd', strtotime($schedule->start_date))][] = array('startDate' => $schedule->start_date, 'description' => $schedule->description, 'type' => 3,'policyNumber' => $policyDetails->policy_number);
            }
        }
        ksort($timelineArray);

        return  $timelineArray;
    }
    
    /**
     * 
     * @param type $customerId
     */
    public function customerTimeline($customerId, $year) {
       $timelineArray = $this->customerTimelineDetails($customerId, $year);
       

        $data = array('timelines' => $timelineArray,'customerId'=>$customerId,'selectedYear'=>$year);
        
        $returnHTML = view('Timeline/customertimeline', $data)->render();

        return response()->json(array('status' => true, 'content' => $returnHTML));  
    }
    /**
     * 
     * @param type $customerId
     * @return type
     */
    private function customerTimelineDetails($customerId,$year) {
       Session::forget('companytimeline_' . Auth::user()->id);
//        $policyDetails = DB::table('policies')
//                ->select('start_date', 'end_date', 'gross_amount', 'policy_number', 'installment_number', 'gross_amount', 'issue_date')
//                ->where('customer_id', $customerId)
//                ->whereIn('policy_status', [2,4])
//                ->whereYear('issue_date', '=', $year)
//                ->get();
        
        
        
        $policyDetails = DB::table('policies')
                ->select('start_date', 'end_date', 'gross_amount', 'policy_number', 'installment_number', 'gross_amount', 'issue_date')
                ->where('customer_id', $customerId)
                ->whereIn('policy_status', [2,4])
                ->whereRaw('(year(issue_date)='.$year.' or year(end_date)='.$year.')')
                ->get();
        


        //InstallmentDetails
        $installmentDetails = DB::table('policy_intallment')
                ->join('policies', 'policies.id', '=', 'policy_intallment.policy_id')
                ->select('policy_intallment.due_date', 'policy_intallment.amount', 'policy_intallment.vat_amount', 'policy_intallment.installment_number','policies.policy_number')                
                ->where('policies.customer_id', $customerId)
                ->whereIn('policies.policy_status', [2,4])
                ->where('policy_intallment.installment_type', 1)
                ->whereYear('policy_intallment.due_date', '=', $year)
                ->orderBy('policy_intallment.due_date')
                ->get();

        //Policyschedule details

        $scheduleDetails = DB::table('policy_schedule')
                ->join('policies', 'policies.id', '=', 'policy_schedule.policy_id')
                
                ->select('policy_schedule.start_date', 'policy_schedule.active_status', 'policy_schedule.description', 'policies.policy_number')
                ->where('policies.customer_id', $customerId)
                ->whereIn('policies.policy_status', [2,4])
                ->where('policy_schedule.active_status', 1)
                ->whereYear('policy_schedule.start_date', '=', $year)
                ->orderBy('policy_schedule.start_date')
                ->get();

        $timelineArray = array();
        $i=0;
        if (count($policyDetails) > 0) {
            foreach ($policyDetails as $policyDetail) {
                
                if(date('Y', strtotime($policyDetail->end_date)) == $year && date('Y', strtotime($policyDetail->start_date)) == $year) {
                  $i++;
                  $timelineArray[date('Ymd', strtotime($policyDetail->start_date))][] = array('startDate' => $policyDetail->start_date, 'policyNumber' => $policyDetail->policy_number, 'type' => 1, 'installmentNumber' => $policyDetail->installment_number, 'issueDate' => $policyDetail->issue_date);      
                  $i++;
                   $timelineArray[date('Ymd', strtotime($policyDetail->end_date))][] = array('startDate' => $policyDetail->end_date, 'policyNumber' => $policyDetail->policy_number, 'type' => 4, 'installmentNumber' => $policyDetail->installment_number);   
                 
                } else if(date('Y', strtotime($policyDetail->start_date)) == $year) {
                  $i++;
                  $timelineArray[date('Ymd', strtotime($policyDetail->start_date))][] = array('startDate' => $policyDetail->start_date, 'policyNumber' => $policyDetail->policy_number, 'type' => 1, 'installmentNumber' => $policyDetail->installment_number, 'issueDate' => $policyDetail->issue_date);   
                } else if(date('Y', strtotime($policyDetail->end_date)) == $year) {
                   $i++;
                   $timelineArray[date('Ymd', strtotime($policyDetail->end_date))][] = array('startDate' => $policyDetail->end_date, 'policyNumber' => $policyDetail->policy_number, 'type' => 4, 'installmentNumber' => $policyDetail->installment_number);   
                }  
                
                }   
        }
        
        //Iterate installment details
    
        if (count($installmentDetails) > 0) {

            foreach ($installmentDetails as $insDetail) {
                $i++;
                $timelineArray[date('Ymd', strtotime($insDetail->due_date))][] = array('startDate' => $insDetail->due_date, 'amount' => $insDetail->amount, 'vatAmount' => $insDetail->vat_amount, 'type' => 2, 'installment' => $insDetail->installment_number,'policyNumber' => $insDetail->policy_number);
            }
        }

        // Iterate schedule details

        if (count($scheduleDetails) > 0) {

            foreach ($scheduleDetails as $schedule) {
                $i++;
                $timelineArray[date('Ymd', strtotime($schedule->start_date))][] = array('startDate' => $schedule->start_date, 'description' => $schedule->description, 'type' => 3,'policyNumber' => $schedule->policy_number);
            }
        }
        ksort($timelineArray);
        Session::put('companytimeline_' . Auth::user()->id, json_encode($timelineArray));

        return  $timelineArray; 
    }
    
     /**
     * 
     * @param type $policyId
     */
    public function downloadCustomerTimelinedetails($customerId,$year) {

        $timelineArray = $this->customerTimelineDetails($customerId,$year);
        $requestArray[] = array('Policy number','Type', 'Policy start date', 'Policy end date', 'Installment due date', 'Schedule date', 'Description', 'Installment amount', 'Vat amount');

        foreach($timelineArray as $key =>$timeline) {
            
        foreach($timeline as $details) {
            if ($details['type'] == 1 ) {
               $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                'Type' =>'Policy',   
                'Policy start date' =>( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Policy end date' =>  '',
                'Installment due date' =>  '',
                'Schedule date' =>  '',
                'Description' => 'Policy was started',
                'Installment amount' => '',
                'Vat amount' => '',
                
            );     
            } else if($details['type'] == 2) {
                $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                'Type' =>'Installment',   
                'Policy start date' => '',
                'Policy end date' => '',
                'Installment due date' => ( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Schedule date' => '',
                'Description' => 'Installment due date',
                'Installment amount' => round(floatval($details["amount"]), 2),
                'Vat amount' => round(floatval($details["vatAmount"]), 2)
                
            );    
            } else if($details['type'] == 3) {
                $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                'Type' =>'Schedule',   
                'Policy start date' => '',
                'Policy end date' => '',
                'Installment due date' => '',
                'Schedule date' => ( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Description' => $details['description'],
                'Installment amount' => '',
                'Vat amount' => '',
                
            );    
            }
            
            else {
                 $requestArray [] = array(
                'Policy number:' => $details['policyNumber'],
                 'Type' =>'Policy',       
                'Policy start date' => '',
                'Policy end date' => ( $details['startDate'] != '') ? date('d-m-Y', strtotime($details['startDate'])) : '',
                'Installment due date' => '',
                'Schedule date' => '',
                'Description' => 'Policy end date',
                'Installment amount' => '',
                'Vat amount' => '',
                
            );   
            }
          
            
        }
        }
        
     

        Excel::create('customertimelinedata_' . date('Ymdhis'), function($excel) use ($requestArray) {
            $excel->setTitle('Policy timeline details');
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

}
