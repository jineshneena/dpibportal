<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InstallmentCorrectionCron extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'installment:correction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installment due date correction';

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

       
        
        
        
        $InstallmentDetails = DB::table('policy_intallment as pi')
                        ->join('policies as p', 'p.id', '=', 'pi.policy_id')                      
                        ->select('pi.id as mainId','policy_number','p.customer_id','pi.end_date','pi.due_date','p.start_date', DB::raw(" DATEDIFF(pi.`due_date`,pi.`end_date`) as daydifference"),'p.id as policyId')->where('pi.installment_type', 1)->get();
    

       //dd($policyDetails);

        if ($InstallmentDetails && count($InstallmentDetails) > 0) {
            foreach ($InstallmentDetails as $installDetail) {

                DB::table('policy_intallment')->where('id',$installDetail->mainId)->update(array('start_date'=>$installDetail->start_date));
                file_put_contents(base_path() . '\startdateinstallmentupdate.txt', PHP_EOL . '######START' . $installDetail->policy_number . '****' . $installDetail->policyId . "######duedate update".$installDetail->mainId, FILE_APPEND);
            }
        }
        
       $this->info('Installment details was update!');
    }

}
