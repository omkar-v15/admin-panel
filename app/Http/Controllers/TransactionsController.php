<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\models\Transaction;
use DB;
use Carbon\Carbon;

class TransactionsController extends Controller
{
    
    function todayTransaction(Request $request){
        $today = Carbon::today()->format('Y-m-d');
       
        $transaction = Transaction::where('paid_status', '1')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get();
        $success = Transaction::select('paid_amount','paid_currency')->where('paid_status', '1')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get()->count();
        $failed =Transaction::where('paid_status', '2')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get()->count();
        $addedtocart = Transaction::where('paid_status', '0')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get()->count();
        $chart = array('success'=>$success, 'failed'=>$failed, 'addedtocart'=>$addedtocart);
   
        $option = "Today"; $total_revenue_count = $this->totalrevenue('today');
        return view('pages.transaction')->with(compact('transaction','option','chart','total_revenue_count'));
    }
    function yesterdayTransaction(Request $request){
        $yesterday = Carbon::yesterday()->format('Y-m-d');
       
        $transaction = Transaction::where('paid_status', '1')->where('paid_date', 'like',$yesterday)->orderBy('ord_id','DESC')->get();
        $success = Transaction::where('paid_status', '1')->where('paid_date', 'like',$yesterday)->orderBy('ord_id','DESC')->get()->count();
        $failed =Transaction::where('paid_status', '2')->where('paid_date', 'like',$yesterday)->orderBy('ord_id','DESC')->get()->count();
        $addedtocart = Transaction::where('paid_status', '0')->where('paid_date', 'like',$yesterday)->orderBy('ord_id','DESC')->get()->count();
        $chart = array('success'=>$success, 'failed'=>$failed, 'addedtocart'=>$addedtocart);
   
        $option = "Yesterday"; $total_revenue_count = $this->totalrevenue('yesterday');
        return view('pages.transaction')->with(compact('transaction','option','chart','total_revenue_count'));
    }
    function thisweekTransaction(Request $request){
        $this_week_start = Carbon::today()->startOfWeek()->toDateTimeString();
        $this_week_end = Carbon::today()->endOfWeek()->toDateTimeString();
       
        $transaction = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$this_week_start,$this_week_end])->orderBy('ord_id','DESC')->get();
        $success = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$this_week_start,$this_week_end])->orderBy('ord_id','DESC')->get()->count();
        $failed =Transaction::where('paid_status', '2')->whereBetween('paid_date', [$this_week_start,$this_week_end])->orderBy('ord_id','DESC')->get()->count();
        $addedtocart = Transaction::where('paid_status', '0')->whereBetween('paid_date', [$this_week_start,$this_week_end])->orderBy('ord_id','DESC')->get()->count();
        $chart = array('success'=>$success, 'failed'=>$failed, 'addedtocart'=>$addedtocart);
   
        $option = "This Week"; $total_revenue_count = $this->totalrevenue('thisweek');
        return view('pages.transaction')->with(compact('transaction','option','chart','total_revenue_count'));
    }
    function lastweekTransaction(Request $request){
        
        $last_week_start = Carbon::today()->startOfWeek()->subDays(7); 
        $last_week_end = Carbon::today()->endOfWeek()->subDays(7); 

        $transaction = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$last_week_start,$last_week_end])->orderBy('ord_id','DESC')->get();
        $success = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$last_week_start,$last_week_end])->get()->count();
        $failed =Transaction::where('paid_status', '2')->whereBetween('paid_date', [$last_week_start,$last_week_end])->get()->count();
        $addedtocart = Transaction::where('paid_status', '0')->whereBetween('paid_date', [$last_week_start,$last_week_end])->get()->count();
        $chart = array('success'=>$success, 'failed'=>$failed, 'addedtocart'=>$addedtocart);
   
        $option = "Last Week"; $total_revenue_count = $this->totalrevenue('lastweek');
        return view('pages.transaction')->with(compact('transaction','option','chart','total_revenue_count'));
    }
    function thismonthTransaction(Request $request){
       
        $this_month_start = new Carbon('first day of this month');
        $this_month_end = new Carbon('last day of this month');
        $this_month_start = $this_month_start->startOfMonth();
        $this_month_end = $this_month_end->endOfMonth();
        $transaction = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$this_month_start,$this_month_end])->orderBy('ord_id','DESC')->get();
        $success = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$this_month_start,$this_month_end])->orderBy('ord_id','DESC')->get()->count();
        $failed =Transaction::where('paid_status', '2')->whereBetween('paid_date', [$this_month_start,$this_month_end])->orderBy('ord_id','DESC')->get()->count();
        $addedtocart = Transaction::where('paid_status', '0')->whereBetween('paid_date', [$this_month_start,$this_month_end])->orderBy('ord_id','DESC')->get()->count();
        $chart = array('success'=>$success, 'failed'=>$failed, 'addedtocart'=>$addedtocart);
   
        $option = "This Month"; $total_revenue_count = $this->totalrevenue('thismonth');
        return view('pages.transaction')->with(compact('transaction','option','chart','total_revenue_count'));
    }
    function lastmonthTransaction(Request $request){
        
        $last_month_start = new Carbon('first day of last month');
        $last_month_end = new Carbon('last day of last month');
        $last_month_start = $last_month_start->startOfMonth();
        $last_month_end = $last_month_end->endOfMonth();

        $transaction = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$last_month_start,$last_month_end])->orderBy('ord_id','DESC')->get();
        $success = Transaction::where('paid_status', '1')->whereBetween('paid_date', [$last_month_start,$last_month_end])->orderBy('ord_id','DESC')->get()->count();
        $failed =Transaction::where('paid_status', '2')->whereBetween('paid_date', [$last_month_start,$last_month_end])->orderBy('ord_id','DESC')->get()->count();
        $addedtocart = Transaction::where('paid_status', '0')->whereBetween('paid_date', [$last_month_start,$last_month_end])->orderBy('ord_id','DESC')->get()->count();
        $chart = array('success'=>$success, 'failed'=>$failed, 'addedtocart'=>$addedtocart);
   
        $option = "Last Month"; $total_revenue_count = $this->totalrevenue('lastmonth');
        return view('pages.transaction')->with(compact('transaction','option','chart','total_revenue_count'));
    }

    function todayChartTransaction(Request $request){
        $id = $request->id;
        $success = 0; $failed = 0; $addedtocart = 0;
        if($id == "today"){
            $today = Carbon::today()->format('Y-m-d');
            $success = Transaction::where('paid_status', '1')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get()->count();
            $failed = Transaction::where('paid_status', '2')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get()->count();
            $addedtocart = Transaction::where('paid_status', '0')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get()->count();
        }
        return response()->json(['success' => $success, 'failed' => $failed, 'addedtocart' => $addedtocart]);
      
    }
    public function calculateRevnueInINR($dbmodel){
        $total_rev = 0; $total_INR = 0; $total_USD = 0; $total_AED = 0; $total_CNY = 0;
        foreach($dbmodel as $pointer){
            if($pointer['paid_currency']=='INR'){
                $tmp_paid_amt = 0.05 * $pointer['paid_amount'];	//PG commission
                $paid_amount_x = $pointer['paid_amount'] - $tmp_paid_amt;
                $total_rev=$total_rev+$paid_amount_x;
                $total_INR = $total_INR + $paid_amount_x;
                                            
                }elseif($pointer['paid_currency']=='USD'){
                $tmp_paid_amt = 0.1 * $pointer['paid_amount']; //PG commission
                $tmp_paid_amt = $tmp_paid_amt * 69; //USD to INR
                $paid_amount_x = ($pointer['paid_amount']*69)-$tmp_paid_amt;
                $total_rev=$total_rev+$paid_amount_x;
                $total_USD = $total_USD + $paid_amount_x;
                                            
                }elseif($pointer['paid_currency']=='AED'){
                $tmp_paid_amt = 0.1 * $pointer['paid_amount']; //PG commission
                $tmp_paid_amt = $tmp_paid_amt * 20; //UAE Dirham to INR
                $paid_amount_x = ($pointer['paid_amount']*20)-$tmp_paid_amt;
                $total_rev=$total_rev+$paid_amount_x;
                $total_AED = $total_AED + $paid_amount_x;
                                        
                }elseif($pointer['paid_currency']=='CNY'){
                $tmp_paid_amt = 0.1 * $pointer['paid_amount']; //PG commission
                $tmp_paid_amt = $tmp_paid_amt * 10; //UAE Dirham to CNY
                $paid_amount_x = ($pointer['paid_amount']*10)-$tmp_paid_amt;
                $total_rev=$total_rev+$paid_amount_x;
                $total_CNY = $total_CNY + $paid_amount_x;                     
                }
        }
        return array($total_rev,$total_INR,$total_USD,$total_AED,$total_CNY);
    }
    function totalrevenue($id){
       
        $temp_today = 0; $temp_yesterday = 0; $temp_this_week = 0; $temp_last_week = 0; $temp_this_month = 0; $temp_last_month = 0;
        $today = Carbon::today()->format('Y-m-d'); $yesterday = Carbon::yesterday()->format('Y-m-d');
        $this_week_start = Carbon::today()->startOfWeek()->toDateTimeString();
        $this_week_end = Carbon::today()->endOfWeek()->toDateTimeString();
        $last_week_start = Carbon::today()->startOfWeek()->subDays(7); 
        $last_week_end = Carbon::today()->endOfWeek()->subDays(7); 
        $this_month_start = new Carbon('first day of this month');
        $this_month_end = new Carbon('last day of this month');
        $this_month_start = $this_month_start->startOfMonth();
        $this_month_end = $this_month_end->endOfMonth();
        $last_month_start = new Carbon('first day of last month');
        $last_month_end = new Carbon('last day of last month');
        $last_month_start = $last_month_start->startOfMonth();
        $last_month_end = $last_month_end->endOfMonth();
        

            $temp_today = Transaction::select('paid_currency','paid_amount')->where('paid_status', '1')->where('paid_date', 'like',$today)->orderBy('ord_id','DESC')->get();
            $temp_yesterday = Transaction::select('paid_currency','paid_amount')->where('paid_status', '1')->where('paid_date', 'like',$yesterday)->orderBy('ord_id','DESC')->get();
            $temp_this_week = Transaction::select('paid_currency','paid_amount')->where('paid_status', '1')->whereBetween('paid_timestamp', [$this_week_start,$this_week_end])->orderBy('ord_id','DESC')->get();
            $temp_last_week = Transaction::select('paid_currency','paid_amount')->where('paid_status', '1')->whereBetween('paid_timestamp', [$last_week_start,$last_week_end])->orderBy('ord_id','DESC')->get();
            $temp_this_month = Transaction::select('paid_currency','paid_amount')->where('paid_status', '1')->whereBetween('paid_timestamp', [$this_month_start,$this_month_end])->orderBy('ord_id','DESC')->get();
            $temp_last_month = Transaction::select('paid_currency','paid_amount')->where('paid_status', '1')->whereBetween('paid_timestamp', [$last_month_start,$last_month_end])->orderBy('ord_id','DESC')->get();

            $temp_today = $this->calculateRevnueInINR($temp_today);
            $temp_yesterday = $this->calculateRevnueInINR($temp_yesterday);
            $temp_this_week = $this->calculateRevnueInINR($temp_this_week);
            $temp_last_week = $this->calculateRevnueInINR($temp_last_week);
            $temp_this_month = $this->calculateRevnueInINR($temp_this_month);
            $temp_last_month = $this->calculateRevnueInINR($temp_last_month);

            if($id == "today"){
                $temp_INR = $temp_today[1];
                $temp_USD = $temp_today[2];
                $temp_AED = $temp_today[3];
                $temp_CNY = $temp_today[4];
            }elseif($id == "yesterday"){
                $temp_INR = $temp_yesterday[1];
                $temp_USD = $temp_yesterday[2];
                $temp_AED = $temp_yesterday[3];
                $temp_CNY = $temp_yesterday[4];
            }elseif($id == "thisweek"){
                $temp_INR = $temp_this_week[1];
                $temp_USD = $temp_this_week[2];
                $temp_AED = $temp_this_week[3];
                $temp_CNY = $temp_this_week[4];
            }elseif($id == "lastweek"){
                $temp_INR = $temp_last_week[1];
                $temp_USD = $temp_last_week[2];
                $temp_AED = $temp_last_week[3];
                $temp_CNY = $temp_last_week[4];
            } elseif($id == "thismonth"){
                $temp_INR = $temp_this_month[1];
                $temp_USD = $temp_this_month[2];
                $temp_AED = $temp_this_month[3];
                $temp_CNY = $temp_this_month[4];
            } elseif($id == "lastmonth"){
                $temp_INR = $temp_last_month[1];
                $temp_USD = $temp_last_month[2];
                $temp_AED = $temp_last_month[3];
                $temp_CNY = $temp_last_month[4];
            }
            
            $temp_today = $this->moneyFormatIndia(round($temp_today[0]));
            $temp_yesterday = $this->moneyFormatIndia(round($temp_yesterday[0]));
            $temp_this_week = $this->moneyFormatIndia(round($temp_this_week[0]));
            $temp_last_week = $this->moneyFormatIndia(round($temp_last_week[0]));
            $temp_this_month = $this->moneyFormatIndia(round($temp_this_month[0]));
            $temp_last_month = $this->moneyFormatIndia(round($temp_last_month[0]));
           

            $final = array('total_revenue_today' => $temp_today, 'total_revenue_INR' => $temp_INR,'total_revenue_USD' => $temp_USD,'total_revenue_AED' => $temp_AED,'total_revenue_CNY' => $temp_CNY, 'total_revenue_yesterday' => $temp_yesterday, 'total_revenue_this_week' => $temp_this_week, 'total_revenue_last_week' => $temp_last_week, 'total_revenue_this_month' => $temp_this_month, 'total_revenue_last_month' => $temp_last_month);

        //return view('pages.transaction')->json(['temp_today' => $temp_today, 'temp_yesterday' => $temp_yesterday, 'temp_this_week' => $temp_this_week, 'temp_last_week' => $temp_last_week, 'temp_this_month' => $temp_this_month, 'temp_last_month' => $temp_last_month]);
        // return response()->with(compact('temp_today','temp_yesterday','temp_this_week','temp_last_week','temp_this_month','temp_last_month'));
      
        return $final;
      
    }


    public function moneyFormatIndia($num){
        $explrestunits = "" ;
        if(strlen($num)>3){
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++){
                // creates each of the 2's group and adds a comma to the end
                if($i==0)
                {
                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                }else{
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }

}
