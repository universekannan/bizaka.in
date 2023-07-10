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
        if ( Auth::user()->user_type_id == 1 ) {
            $wallet = DB::table( 'payment' )->orderBy( 'id', 'Asc' )->where( 'paydate', '>=', $from )->where( 'paydate', '<=', $to )->get();
        } else {
            $wallet = DB::table( 'payment' )->where( 'to_id', $login )->where( 'paydate', '>=', $from )->where( 'paydate', '<=', $to )->orderBy( 'id', 'Asc' )->get();
        }
        $sql = '';
        if ( Auth::user()->user_type_id == 1 ) {
            $sql = "Select * from `users` where `user_type_id` = '1' order by `id` desc limit 1 ";
        } else if ( Auth::user()->user_type_id == 2 ) {
            $sql = "Select * from `users` where `user_type_id` = '2' order by `id` desc limit 1 ";
        } else if ( Auth::user()->user_type_id == 3 ) {
            $sql = "Select * from `users` where `user_type_id` = '3' order by `id` desc limit 1 ";
        } else if ( ( Auth::user()->user_type_id == 4 ) || ( Auth::user()->user_type_id == 5 ) ) {
            $sql = "select `a`.*,`b`.`full_name`,`phone`,`upi`,`payment_qr_oode` from `assigned_district` `a`,`users` `b` where `a`.`user_id`=`b`.`id` and `a`.`district_user_id`='$login'";
        } else {
            $referral_id = Auth::user()->id;
            $sql = "Select * from `users` where `id` = $referral_id order by `id` desc limit 1 ";

        }
        $referencedata = DB::select( DB::raw( $sql ) );

        if ( Auth::user()->user_type_id == 1 ) {
            $sql = 'Select * from `users`';
        } else if ( ( Auth::user()->user_type_id == 16 ) || ( Auth::user()->user_type_id == 17 ) ) {
            $assigned_user_id = Auth::user()->id;
            $sql = "select * from users where assigned_user_id= $assigned_user_id";
        } else {
            $sql = "Select * from `users` where `referral_id` = $referral_id";
        }
        $userpayment = DB::select( DB::raw( $sql ) );
        return view( 'wallet/index', compact( 'wallet', 'referencedata', 'userpayment', 'from', 'to' ) );
    }

    public function superadminaddwallet( Request $request )
 {      
        $from = date('Y-m-d' ,strtotime('-1 days'));
        $to =  date('Y-m-d');
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

}