<?php

namespace App\Http\Controllers\Mobile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
use Jenssegers\Agent\Agent;

class MobileWalletController extends Controller {

    public function requestamount(){
		
        $userid = Auth::user()->id;
        if($userid == '3'){
            $sql = "select a.*,b.name from request_payment a,users b where a.from_id=b.id order by id desc";
         //echo $sql;die;
        $paymentrequest =  DB::select( DB::raw( $sql ));
        }else{
		$sql = "select * from request_payment where from_id=$userid or to_id = $userid order by id desc";
         //echo $sql;die;
        $paymentrequest =  DB::select( DB::raw( $sql ));
        $paymentrequest = json_decode( json_encode( $paymentrequest ), true );
        foreach($paymentrequest as $key1 => $payment){
            $paymentfrom_id = $payment['from_id'];
            $sql = "select name from users where id=$paymentfrom_id  order by `id` desc";
            $details =  DB::select( DB::raw( $sql ));
            $fullname = $details[0]->name;

            $paymentrequest[$key1]['name'] = $fullname;

        }
        $paymentrequest = json_decode(json_encode($paymentrequest));
    }
        //echo"<pre>";print_r($paymentrequest);echo"</pre>";die;

        $sql = '';
        if ( Auth::user()->id == 3 ) {
            $sql = "Select * from `users` where `id` = '1' order by `id` desc limit 1 ";

        } else {
            $parent_id = Auth::user()->parent_id;
            $sql = "Select * from `users` where `id` = $parent_id order by `id` desc limit 1 ";

        }
        $referencedata = DB::select( DB::raw( $sql ) );

        return view('mobile.requestamount',compact('paymentrequest','referencedata'));
    }

    public function exchangeamount( Request $request ) {

        return view( 'mobile.exchangeamount' );
    }
}
