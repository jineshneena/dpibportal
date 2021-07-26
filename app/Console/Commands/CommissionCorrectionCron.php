<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CommissionCorrectionCron extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Commission:correction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commission correction of installments';

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
                   $join->whereIn('p.policy_status', [ 2, 4, 5]);
                })                  
                        ->select('pc.distributor_type','pc.percentage','pc.sales_person_id','p.policy_number','p.customer_id','pc.installment_id','p.id as policyId','pc.commission_type')->whereBetween('p.issue_date',['2020-01-01','2020-05-31'])-> groupBy('pc.policy_id','pc.distributor_type')->orderBy('pc.policy_id')->get();

                        
$commissionArray = array();
$installmentdetailsArray = array();
foreach($commissionDetails as $commissiondata) {
        $commissionArray[$commissiondata->policyId][$commissiondata->sales_person_id] = $commissiondata;


}


if(count($commissionArray)>0) {
    foreach($commissionArray as $key => $commission) {
echo 'key is:'.$key;
//delete commission with policy id as same and installment_id as null
  DB::table('policy_commission')->where('policy_id', '=',$key)->whereNull('installment_id')->delete();
//delete commission with policy id as same and instmment type =1 and installment id is notnull
 DB::table('policy_commission as pc')
                       
                            ->join('policy_intallment as pi', function($join) use ($key) {
                        $join->on('pc.installment_id', '=', 'pi.id');
                        $join->where('pi.policy_id', $key);
                })                           
                        ->where('pi.installment_type', 1)->delete();

//select all installment with type 1
$InstallmentDetails = DB::table('policy_intallment as pi')
                                          
                        ->select('pi.*')->where('pi.installment_type', 1)->where('pi.policy_id',$key)->get();

if (count($InstallmentDetails) > 0) {
            $companyCommissionArray =array(); 
   
              foreach($InstallmentDetails as $installments) {
                           foreach($commission as $policycomm) {
                                $percentage = floatval($policycomm->percentage);

                             if($policycomm->distributor_type == 'diamond') {
                                $companyCommissionArray[$key] = floatval(($installments->amount * $percentage) / 100); 
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


    

     

     
        
       $this->info('commission details was update!');
    }

}
