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

  $sql = "with recursive cte (id,name, usertype_id, referral_id) as (
  select id,
  name,
  usertype_id,
  referral_id
  from       users
  where      id = $referral_id
  union all
  select     p.id,
  p.name,
  p.usertype_id,
  p.referral_id
  from       users p
  inner join cte
  on p.id = cte.referral_id
  )
  select * from cte;";
  $result = DB::select( DB::raw( $sql ) );
        foreach ( $result as $row ) {
            $to_id = $row->id;
            $percentage = ($amount / 10) * 100; // 20
            echo $percentage;die;
            $ad_info = 'Income';
            $service_status = 'Out Payment';
            $sql = "insert into payment (log_id,from_id,to_id,customer_id,service_id,pay_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$log_id','$to_id', '$customer_id','$service_id','$pay_id','$amount','$ad_info', '$service_status','$time','$paydate')";
            DB::insert( DB::raw( $sql ) );
            $sql = "update users set wallet = wallet + $amount where id = $to_id";
            DB::update( DB::raw( $sql ) );
            $ad_info = 'Application';
            $service_status = 'IN Payment';
            $sql = "insert into payment (log_id,from_id,to_id,customer_id,service_id,pay_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$to_id','$log_id', '$customer_id','$service_id','$pay_id','$amount','$ad_info', '$service_status','$time','$paydate')";
            DB::insert( DB::raw( $sql ) );
		}

        return redirect( "/purchase/$member_id" )->with( 'success', 'Member added successfully' );
    }
}
