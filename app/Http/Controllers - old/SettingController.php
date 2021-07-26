<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SettingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
      
    
    public function showChangePasswordForm() {
       return view('auth.changepassword');   
    }
    
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|min:6|confirmed',
        ]);
        


        //Change Password
        
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");

    }
 /**
     * 
     * @param type $period
     * @return type
     */
    public function getPeriodlockForm($period = '') {

        if ($period == '') {
            $period = date('Y');
        }

        $periodDetails = DB::table('finance_period_settings')
                        ->where('period_year', $period)
                        ->select('*')->get();

        $years = DB::table('finance_period_settings')
                      ->select('period_year')->orderBy('period_year')->groupBy('period_year')->get();
        $month = $this->getMonthArray();

        return view('Settings/financeperiod', array('periods' => $periodDetails, 'selectedperiod' => $period, 'months' => $month, 'yearArray' => $years));
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function saveFinanceperiods(Request $request) {

        $insertArray = [];
        $months = $this->getMonthArray();
        foreach ($months as $key => $month) {
            $insertArray[$key]['period_month'] = $key;
            $insertArray[$key]['period_year'] = $request->get('selectedyear');
            $insertArray[$key]['updated_date'] = date('Y-m-d H:i');
            $insertArray[$key]['updated_by'] = Auth::user()->id;

            if (array_key_exists($key, $request->get('monthSelection'))) {

                $insertArray[$key]['period_status'] = '1';
            } else {

                $insertArray[$key]['period_status'] = '0';
            }
        }
        DB::table('finance_period_settings')->where('period_year', $request->get('selectedyear'))->delete();
        DB::table('finance_period_settings')->insert($insertArray);

        return redirect()->route('setperiodlock', $request->get('selectedyear'))->with('success', 'Successfully update the account period!');
    }

    /**
     * 
     */
    public function addAccountingyear() {

        $maximumYear = DB::table('finance_period_settings')
                        ->select(DB::raw(" MAX(period_year) as maxYear"))->first();
        $newYear = $maximumYear->maxYear + 1;
        $months = $this->getMonthArray();
        $insertArray = [];
        foreach ($months as $key => $month) {
            $insertArray[$key]['period_month'] = $key;
            $insertArray[$key]['period_year'] = $newYear;
            $insertArray[$key]['updated_date'] = date('Y-m-d H:i');
            $insertArray[$key]['updated_by'] = Auth::user()->id;
            $insertArray[$key]['period_status'] = '0';
        }
        DB::table('finance_period_settings')->where('period_year', $newYear)->delete();
        DB::table('finance_period_settings')->insert($insertArray);
        $url = route('setperiodlock', $newYear);
        Session::flash('success', 'Successfully created period lock for the year ' . $newYear);
        return response()->json(array('status' => true,  'returnUrl' => $url));
    }
    /**
     * 
     * @param Request $request
     * @return type
     */
    public function getPeriodDetails(Request $request) {
        $period = $request->get('selectedYear');
        $periodDetails = DB::table('finance_period_settings')
                        ->where('period_year', $period)
                        ->select('*')->get();
         $months = $this->getMonthArray();
         $returnHTML = view('Settings/montwise_template', array('periods' => $periodDetails,'months' => $months))->render();
        return response()->json(array('status' => true,  'returnHtml' => $returnHTML));
    }
    
     public function checkFinancelock(Request $request) {
        $selecteddate = $request->get('selectedDate');
        $periodDetails = DB::table('finance_period_settings')
                        ->where('period_year', date('Y',strtotime($selecteddate)))
                        ->where('period_month', date('n',strtotime($selecteddate)))
                        ->where('period_status', '1')
                        ->count();
    $lockFlag = false;
    if($periodDetails >0) {
      $lockFlag = true;
    } 
         
        return response()->json(array('status' => true,  'lock' => $lockFlag));
    }
    

    /**
     * 
     * @return string
     */
    private function getMonthArray() {
        $months[1] = 'January';
        $months[2] = 'February';
        $months[3] = 'March';
        $months[4] = 'April';
        $months[5] = 'May';
        $months[6] = 'June';
        $months[7] = 'July';
        $months[8] = 'August';
        $months[9] = 'September';
        $months[10] = 'October';
        $months[11] = 'November';
        $months[12] = 'December';

        return $months;
    }

}