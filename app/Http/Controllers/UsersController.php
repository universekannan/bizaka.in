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
            'referral_id' => $request->referral,
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
        return view( 'users/purchase', compact( 'purchases' ) );
    }

    public function addproduct( Request $request ) {
        $log_id = Auth::user()->id;
        DB::table( 'purchase' )->insert( [
            'member_id' => $request->member_id,
            'amount' => $request->amount,
            'purchase_date' =>  date( 'Y-m-d H:i:s' ),
            'log_id' => $request->log_id,
        ] );
        return redirect( '/purchase/6' )->with( 'success', 'Member added successfully' );
    }
}
