<?php

namespace App\Http\Controllers\Mobile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
use Jenssegers\Agent\Agent;

class MobileWalletController extends Controller {


    public function withdrawal(){
        $id = Auth::user()->id;
        $withdrawal = DB::table( 'withdrawal' )->where( 'user_id', $id )->orderBy( 'id', 'Desc' )->get();
        $status ="";
        if(count($withdrawal) > 0){
        $status = $withdrawal[0]->status;
        }
        return view( 'mobile.withdrawal',compact('withdrawal','status') );
    }

    public function applywithdrawal(Request $request) {
        DB::table( 'withdrawal' )->insert( [
            'user_id' => Auth::user()->id,
            'amount' => $request->withdraw_amount,
            'req_time' =>  date( 'Y-m-d H:i:s' ),
            'status' =>  'Pending',
        ] );
        return redirect( 'withdrawal' );
    }

    public function summary(){
        $id = Auth::user()->id;
        $inpayment = DB::table( 'payment' )->where( 'to_id', '=', $id )->where( 'service_status', '=', 'In Payment' )->orderBy( 'id', 'Asc' )->get();
     $inpayment = json_decode( json_encode( $inpayment ), true );
     foreach($inpayment as $key1 => $payment){
         $paymentfrom_id = $payment['from_id'];
         $sql = "select name from users where id=$paymentfrom_id";
         $details =  DB::select( DB::raw( $sql ));
         $fullname = $details[0]->name;

         $inpayment[$key1]['name_from'] = $fullname;

     }
     $inpayment = json_decode(json_encode($inpayment));

     $outpayment = DB::table( 'payment' )->where( 'from_id', '=', $id )->where( 'service_status', '=', 'In Payment' )->orderBy( 'id', 'Asc' )->get();
     $outpayment = json_decode( json_encode( $outpayment ), true );
     foreach($outpayment as $key1 => $payment){
         $paymentto_id = $payment['to_id'];
         $sql = "select name from users where id=$paymentto_id";
         $details =  DB::select( DB::raw( $sql ));
         $fullname = $details[0]->name;

         $outpayment[$key1]['name_to'] = $fullname;

     }
     $outpayment = json_decode(json_encode($outpayment));

        return view( 'mobile.summary',compact('inpayment','outpayment') );
    }
}
