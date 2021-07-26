<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EndCommissionCorrectionCron extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'EndorsementCommission:correction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Endorsement Commission correction of installments';

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

       //find all the commission details between the date without installment id

   $datetime = date('Y-m-d h:i:s');    
    $insertArray =array();
  $commissionDetails = DB::table('policy_commission as pc')
                        
                        ->join('policies as p', function($join) {
                    $join->on('pc.policy_id', '=', 'p.id');
                    $join->where('p.policy_status', 2);
                })                  
                        ->select('pc.distributor_type','pc.percentage','pc.sales_person_id','p.policy_number','p.customer_id','pc.installment_id','p.id as policyId','pc.commission_type')->whereBetween('p.issue_date',['2020-03-01','2021-03-15'])-> groupBy('pc.policy_id','pc.distributor_type')->orderBy('pc.policy_id')->get();

                        
$commissionArray = array();
$installmentdetailsArray = array();
foreach($commissionDetails as $commissiondata) {
        $commissionArray[$commissiondata->policyId][$commissiondata->sales_person_id] = $commissiondata;


}


if(count($commissionArray)>0) {
    foreach($commissionArray as $key => $commission) {
echo 'key is:'.$key;

//delete commission with policy id as same and instmment type =1 and installment id is notnull
 DB::table('policy_commission as pc')
                       
                            ->join('policy_intallment as pi', function($join) use ($key) {
                        $join->on('pc.installment_id', '=', 'pi.id');
                        $join->where('pi.policy_id', $key);
                })                           
                        ->where('pi.installment_type', 2)->delete();

//select all installment with type 1
$InstallmentDetails = DB::table('policy_intallment as pi')
                                          
                        ->select('pi.*')->where('pi.installment_type', 2)->where('pi.policy_id',$key)->get();

if (count($InstallmentDetails) > 0) {
            $companyCommissionArray =array(); 
   
              foreach($InstallmentDetails as $installments) {
                           foreach($commission as $policycomm) {
                                $percentage = floatval($policycomm->percentage);
                                $amount = (floatval($installments->amount) <0) ? -1*$installments->amount :$installments->amount; 
                             if($policycomm->distributor_type == 'diamond') {
                                $companyCommissionArray[$key] = floatval(($amount * $percentage) / 100); 
                                $commissionAmount =  $companyCommissionArray[$key]; 
                             } else {
                                $commissionAmount = floatval(($companyCommissionArray[$key] * $percentage) / 100); 
                             }


                        $insertArray[] = array("policy_id" => $key,
                            "distributor_type" => $policycomm->distributor_type,
                            "commission_type" => $policycomm->commission_type,
                            "percentage" => $percentage,
                            "amount" => $commissionAmount,
                            "added_date" => $datetime,
                            "sales_person_id" => $policycomm->sales_person_id,
                            "installment_id" => $installments->id
                        );

                           } 
                    
              

                        }




}



    }
}


if(count($insertArray)>0){
DB::table('policy_commission')->insert($insertArray);
}


    

     

     
        
       $this->info('Endorsement commission details was update!');
    }

}
