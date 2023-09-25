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

    public function addproductd( Request $request ) {
        $log_id = Auth::user()->id;
        $amount = $request->amount;
        DB::table( 'purchase' )->insert( [
            'member_id' => $request->member_id,
            'amount' => $amount,
            'purchase_date' =>  date( 'Y-m-d' ),
            'added_datetime' =>  date( 'Y-m-d H:i:s' ),
            'log_id' => $log_id,
        ] );
		$member_id = $request->member_id;
		  $sql = "select referral_id from users where id = $member_id";
		  $result = DB::select(DB::raw($sql));
	    $referral_id = $result[0]->referral_id;

        $paydate = date('Y-m-d');
    $time = date("H:i:s");
    $member_id = 0;
    $child_id = 0;
    $parent_id = 0;
    $wallet = 0;
    $sql = "select * from users where referral_id = '$referral_id'";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $member_id = $result[0]->id;
      $child_id = $result[0]->id;
      $parent_id = $result[0]->referral_id;
      
    }
    $ownamount = ceil($amount * 10 / 100);
    $ad_info = "Own Amount";
    $service_status = "In Payment";
    $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$member_id','$member_id', '$ownamount','$ad_info', '$service_status','$time','$paydate')";
    DB::insert(DB::raw($sql));
    $sql = "update users set wallet = wallet + $amount where id = $member_id";
    DB::update(DB::raw($sql));
    $first_parent = true;
    do{
      $sql = "select * from users where id = $child_id";
      $result = DB::select(DB::raw($sql));
      if(count($result) > 0){
        $child_id = $result[0]->id;
        $parent_id = $result[0]->referral_id;

      }

      if($parent_id != 1 && $first_parent == true) {
        $amount = ceil($amount * 2 / 100);
        
      }
       if($parent_id != 1 && $first_parent == false) {
        $amount = ceil($amount * 1 / 100);
        $bal = $amount;
       
      }
      
      if($parent_id == 1 && $first_parent == true){
        $amount = ceil($amount * 1 / 100);
        $bal = $amount;
       
       
      }
      if($parent_id == 1 && $first_parent == false){
        $amount = ceil($amount * 1 / 100);
        $amount = $amount + $bal;
      } 


     
      $first_parent = false;
      $ad_info = "Activation";
      $service_status = "In Payment";
      $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$child_id','$parent_id', '$amount','$ad_info', '$service_status','$time','$paydate')";
      DB::insert(DB::raw($sql));
      $sql = "update users set wallet = wallet + $amount where id = $parent_id";
      DB::update(DB::raw($sql));
      $child_id = $parent_id;
    }while($parent_id != 1);

        return redirect( "/purchase/$member_id" )->with( 'success', 'Member added successfully' );
    }

    public function walletlogin(){
        return view('mobile/signin');
      }
      public function dashboard(){
        return view('mobile/dashboard');
      }
}
