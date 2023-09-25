<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

class UsersController extends Controller
{

    public function members() {
        $parent_id = Auth::user()->id;
        if ( $parent_id == 1 )
            $members = DB::table( 'users' )->where( 'usertype_id', 3 )->orderBy( 'id', 'Asc' )->get();
        else
            $members = DB::table( 'users' )->where( 'parent_id', $parent_id )->orderBy( 'id', 'Asc' )->get();

        return view( 'users/index', compact( 'members' ) );
    }

    public function addmember( Request $request ) {
        $password = rand( 1001, 9999 );
        $passwordhash = Hash::make( $password );

        DB::table( 'users' )->insert( [
            'name' => $request->name,
            'referral_id' => $request->parent_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'plain_password' => $password,
            'password' => $passwordhash,
            'usertype_id' => 3,
            'created_at' =>  date( 'Y-m-d H:i:s' ),
        ] );
        return redirect( '/members' )->with( 'success', 'Member added successfully' );
    }

    public function updatemember( Request $request ) {

        DB::table( 'users' )->where('id',$request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' =>  date( 'Y-m-d H:i:s' ),
        ]);
        return redirect( '/members' )->with( 'success', 'Member added successfully' );
    }

    public function purchase($id){
        $purchases = DB::table( 'purchase' )->where( 'member_id', $id )->orderBy( 'id', 'Asc' )->get();
        return view( 'users/purchase', compact( 'purchases','id' ) );
    }

    public function addproduct( Request $request ) {
        $log_id = Auth::user()->id;
        $amount = $request->amount;
        $paydate = date('Y-m-d');
        $time = date("H:i:s");
        $member_id = $request->member_id;
        DB::table( 'purchase' )->insert( [
            'member_id' => $member_id,
            'amount' => $amount,
            'purchase_date' =>  date( 'Y-m-d' ),
            'added_datetime' =>  date( 'Y-m-d H:i:s' ),
            'log_id' => $log_id,
        ]);
        $paycount = 0;
        $points = round($amount * 10 / 100);
        $ad_info = "In Payment";
        $service_status = "In Payment";
        $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$member_id','$member_id', '$points','$ad_info', '$service_status','$time','$paydate')";
        DB::insert(DB::raw($sql));
        $sql = "update users set wallet = wallet + $points where id = $member_id";
        DB::update(DB::raw($sql));
        $paycount++;
        $user_id = $member_id;
        $percentage = 2;
        while(true){
            $sql = "select referral_id from users where id = $user_id";
            $result = DB::select(DB::raw($sql));
            if(count($result)>0){
                $user_id = $result[0]->referral_id;
                if($user_id != 0 && $paycount <= 7){
                    if($paycount == 1){
                        $percentage = 2;
                    }else if($paycount == 2){
                        $percentage = 1;
                    }else{
                        $percentage = 0.5;
                    }
                    $points = round($amount * $percentage / 100);
                    $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$member_id','$user_id', '$points','$ad_info', '$service_status','$time','$paydate')";
                    DB::insert(DB::raw($sql));
                    $sql = "update users set wallet = wallet + $points where id = $user_id";
                    DB::update(DB::raw($sql));
                }else{
                    break;
                }
                $paycount++;
            }else{
                break;
            }
        }    
        return redirect( "/purchase/$member_id" )->with( 'success', 'Purchase added successfully');
    }
}
