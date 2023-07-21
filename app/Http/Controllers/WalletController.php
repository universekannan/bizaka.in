<?php
namespace App\Http\Controllers;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
 {
    public function __construct()
 {
        $this->middleware( 'auth' );
    }

    public function index( $from, $to)
    {
        $login = Auth::user()->id;
        $referral_id = Auth::user()->id;

            $wallet = DB::table( 'payment' )->select('payment.*','users.name')
     ->Join('users', 'users.id', '=', 'payment.from_id')->where( 'to_id', $login )->where( 'paydate', '>=', $from )->where( 'paydate', '<=', $to )->orderBy( 'id', 'Asc' )->get();
		
        $sql = '';
        if ( Auth::user()->id == 1 ) {
            $sql = "Select * from `users` where `id` = '1' order by `id` desc limit 1 ";

        } else {
            $parent_id = Auth::user()->parent_id;
            $sql = "Select * from `users` where `id` = $parent_id order by `id` desc limit 1 ";

        }
        $referencedata = DB::select( DB::raw( $sql ) );


        if ( Auth::user()->id == 1 ) {
            $sql = 'Select * from `users`';
        } else {
            $parent_id = Auth::user()->id;
            $sql = "select * from users where parent_id= $parent_id";
        } 
        $userpayment = DB::select( DB::raw( $sql ) );

        $sql = "select status from request_payment where from_id=$login and status='Pending'";
        $paymentrequest =  DB::select( DB::raw( $sql ));
        $status ="";
        if(count($paymentrequest) > 0){
        $status = $paymentrequest[0]->status;
        }

		
        return view( 'wallet/index', compact( 'wallet', 'referencedata', 'userpayment', 'from', 'to','status' ) );
    }

    public function superadminaddwallet( Request $request )
 {      
        $from = date('Y-m-d' ,strtotime('-1 days'));
        $to = date('Y-m-d');
        $amount = $request->fundamount;
        $login_id = Auth::user()->id;
        $date = date( 'Y-m-d' );
        $time = date( 'H:i:s' );
        $ad_info = 'Fund Transfer';
        $service_status = 'IN Payment';
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$login_id','$login_id','$login_id','$amount','$ad_info', '$service_status','$time','$date')";
        DB::insert( DB::raw( $sql ) );
        $sql = "update users set wallet = wallet + $amount where id = 1";
        DB::update( DB::raw( $sql ) );
        return redirect( "wallet/$from/$to" );
    }
    public function addwallet( Request $request )
 {      
        $from = date('Y-m-d' ,strtotime('-1 days'));
        $to =  date('Y-m-d');
        $to_user = $request->user_id;
        $amount = $request->transfer_payment;
        $login_id = Auth::user()->id;
        $date = date( 'Y-m-d' );
        $time = date( 'H:i:s' );
        $ad_info = 'Fund Transfer';
        $service_status = 'IN Payment';
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$login_id','$login_id','$to_user','$amount','$ad_info', '$service_status','$time','$date')";
        DB::insert( DB::raw( $sql ) );
        $insertid = DB::getPdo()->lastInsertId();
        $sql = "update payment set pay_id = $insertid where id = $insertid";
        DB::update( DB::raw( $sql ) );
        $sql = "update users set wallet = wallet + $amount where id = $to_user";
        DB::update( DB::raw( $sql ) );
        $service_status = 'Out Payment';
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate,pay_id) values ('$login_id','$to_user','$login_id','$amount','$ad_info', '$service_status','$time','$date','$insertid')";
        DB::insert( DB::raw( $sql ) );
        $sql = "update users set wallet = wallet - $amount where id = $login_id";
        DB::update( DB::raw( $sql ) );
        return redirect( "wallet/$from/$to" );

    }

    public function servicepaymentdelete( $payid ) {
        $from = date('Y-m-d' ,strtotime('-1 days'));
        $to =  date('Y-m-d');
        $sql = "select * from payment where pay_id='$payid' and ad_info='Fund Transfer'";
        $result =  DB::select( DB::raw( $sql ));
          $service_status = $result[0]->service_status;
          $amount = $result[0]->amount;
          $from_user = $result[0]->from_id;
          $to_user = $result[0]->to_id;
          $sql = "update users set wallet = wallet + $amount where id = $from_user";
          DB::update( DB::raw( $sql ) );
          $sql = "update users set wallet = wallet - $amount where id = $to_user";
          DB::update( DB::raw( $sql ) );
          $sql = "delete from payment where pay_id=$payid";
          DB::delete( DB::raw( $sql ) );
        return redirect( "wallet/$from/$to" )->with( 'success', 'Payment Deleted Successfully' );
    }
	
    public function newrequest(){
        $userid = Auth::user()->id;
        if($userid == 1){
        $sql = "select a.*,b.name,b.upi,payment_qr_oode from withdrawal a,users b where a.user_id = b.id and a.status='Pending'";
        }else{
        $sql = "select a.*,b.name,b.upi,payment_qr_oode from withdrawal a,users b where a.user_id = b.id and a.user_id='$userid' order by a.id desc";
        }
        $withdrawal =  DB::select( DB::raw( $sql ));
        $status ="";
        if(count($withdrawal) > 0){
        $status = $withdrawal[0]->status;
        }
        //echo"<pre>";print_r($withdrawal);echo "</pre>";die;
        return view('wallet.newrequest',compact('withdrawal','status'));
    }

    public function saverequest(Request $request){
        $user_id = Auth::user()->id;
        $amount = $request->amount;
        $req_time = date("Y-m-d H:i:s");
        $status = "Pending";
        $sql = "insert into withdrawal (user_id,amount,req_time,status) values ($user_id,$amount,'$req_time','$status')";
        DB::insert( DB::raw($sql));
        $sql = "update users set wallet = wallet - $amount where id = $user_id";
        DB::update( DB::raw( $sql ) );
        return redirect( "/newrequest" );
    }

    public function requestpayment(){
        $userid = Auth::user()->id;
		$sql = "select * from request_payment where from_id=$userid or to_id = $userid";
         //echo $sql;die;
        $paymentrequest =  DB::select( DB::raw( $sql ));

        $sql = '';
        if ( Auth::user()->id == 1 ) {
            $sql = "Select * from `users` where `id` = '1' order by `id` desc limit 1 ";

        } else {
            $parent_id = Auth::user()->parent_id;
            $sql = "Select * from `users` where `id` = $parent_id order by `id` desc limit 1 ";

        }
        $referencedata = DB::select( DB::raw( $sql ) );

        return view('wallet.requestpayment',compact('paymentrequest','referencedata'));
    }

    public function paymentrequest(Request $request){
        $from_id = Auth::user()->id;
        $confirm = DB::table('request_payment')->insert([
          'from_id' => $from_id,
          'to_id' => $request->to_id,
          'amount' => $request->amount,
          'status' => 'Pending',
          'req_date' => date("Y-m-d"),
          'req_time' => date("Y-m-d H:i:s"),
        ]);
        $insertid = DB::getPdo()->lastInsertId();

        $req_image = "";
        if ($request->req_image != null) {
          $req_image = $insertid.'.'.$request->file('req_image')->extension();
          $filepath = public_path('uploads' . DIRECTORY_SEPARATOR . 'requestimg' . DIRECTORY_SEPARATOR);
          move_uploaded_file($_FILES['req_image']['tmp_name'], $filepath . $req_image);
      }
      $image = DB::table('request_payment')->where('id', $insertid)->update([
          'req_image' => $req_image,
        ]);
  
          return redirect( "/requestpayment" );
      }

      public function approverequest_payment(Request $request) {
		
        $amount = $request->amount;
	    $from_id = $request->from_id;
	    $row_id = $request->row_id;
        $login_id = Auth::user()->id;
        $date = date( 'Y-m-d' );
        $time = date( 'H:i:s' );
        $status = 'Approved';
        $sql = "update request_payment set status = '$status' where id = $row_id";
        DB::update( DB::raw( $sql ) );
		$service_status = 'Out Payment';
		$ad_info = 'Fund Transfer';
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate,pay_id) values ('$login_id','$login_id','$from_id','$amount','$ad_info', '$service_status','$time','$date','$row_id')";
        DB::insert( DB::raw( $sql ) );
        $sql = "update users set wallet = wallet + $amount where id = $from_id";
        DB::update( DB::raw( $sql ) );
        $service_status = 'IN Payment';
		$ad_info = 'Fund Transfer';
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate,pay_id) values ('$login_id','$from_id','$login_id','$amount','$ad_info', '$service_status','$time','$date','$row_id')";
        DB::insert( DB::raw( $sql ) );
        $sql = "update users set wallet = wallet - $amount where id = $login_id";
        DB::update( DB::raw( $sql ) );
       
        return redirect( "requestpayment" )->with( 'success', 'Request Amount  Successfully' );
      }

    public function confirmwithdrawal(Request $request){

      $confirm = DB::table('withdrawal')->where('id', $request->approve_id)->update([
        'status' => 'Completed',
        'paid_time' => date("Y-m-d H:i:s"),
      ]);
      $payimage = "";
      if ($request->pay_image != null) {
        $payimage = $request->approve_id.'.'.$request->file('pay_image')->extension();
        $filepath = public_path('uploads' . DIRECTORY_SEPARATOR . 'paidimg' . DIRECTORY_SEPARATOR);
        move_uploaded_file($_FILES['pay_image']['tmp_name'], $filepath . $payimage);
    }
    $image = DB::table('withdrawal')->where('id', $request->approve_id)->update([
        'pay_image' => $payimage,
      ]);

        return redirect( "/newrequest" );
    }

}