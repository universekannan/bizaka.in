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
        $parent_id = Auth::user()->id;

        DB::table( 'users' )->insert( [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'referral_id' => $request->referral,
            'plain_password' => $password,
            'password' => $passwordhash,
            'parent_id' => $parent_id,
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

        return view( 'users/purchase', compact( 'purchases' ) );
    }

}
