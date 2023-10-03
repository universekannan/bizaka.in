<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

class WithdrawalController extends Controller
 {

    public function __construct()
    {
           $this->middleware( 'auth' );
       }
   

    public function approvewithdraw() {
    $sql = "select a.*,b.name from withdrawal a,users b where a.user_id = b.id and a.status='Pending'";
    $withdrawal =  DB::select( DB::raw( $sql ));
        return view( 'withdraw/index', compact( 'withdrawal' ) );
    }

    public function confirmwithdrawal(Request $request){
        $login_id = Auth::user()->id;
        $amount = $request->amount;
        $from_id = $request->user_id;
        $row_id = $request->approve_id;
        $date = date( 'Y-m-d' );
        $time = date( 'H:i:s' );
        $confirm = DB::table('withdrawal')->where('id', $row_id)->update([
          'status' => 'Completed',
          'paid_time' => date("Y-m-d H:i:s"),
        ]);
        $service_status = 'IN Payment';
		$ad_info = 'Withdrawal';
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate,pay_id) values ('$login_id','$from_id','$login_id','$amount','$ad_info', '$service_status','$time','$date','$row_id')";
        DB::insert( DB::raw( $sql ) );
        $sql = "update users set wallet = wallet + $amount where id = $login_id";
        DB::update( DB::raw( $sql ) );
        $service_status = 'Out Payment';
		$ad_info = 'Withdrawal';
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate,pay_id) values ('$login_id','$login_id','$from_id','$amount','$ad_info', '$service_status','$time','$date','$row_id')";
        DB::insert( DB::raw( $sql ) );
        $sql = "update users set wallet = wallet - $amount where id = $from_id";
        DB::update( DB::raw( $sql ) );
       
  
          return redirect( "/approvewithdraw" );
      }

}
