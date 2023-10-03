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
        $withdrawal = DB::table( 'withdrawal' )->where( 'user_id', $id )->orderBy( 'id', 'Desc' )->get();
        $status ="";
        if(count($withdrawal) > 0){
        $status = $withdrawal[0]->status;
        }
        return view( 'mobile.summary',compact('withdrawal','status') );
    }
}
