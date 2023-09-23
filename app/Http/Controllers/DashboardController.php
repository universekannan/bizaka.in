<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

class DashboardController extends Controller
 {
    public function __construct()
 {
        $this->middleware( 'auth' );
    }

    public function dashboard( Request $request ) {
        $id = Auth::user()->id;
        $today = date( 'Y-m-d' );
        $usertype_id = Auth::user()->usertype_id;
        $members_count = 0;
        $todays_income = 0;
        $total_income = 0;
        $wallet = 0;
        $requestpayment = 0;
        $withdrawalpayment = 0;
        if ( $usertype_id == 1 ) {
            $sql = 'select count(*) as members from users where parent_id=2';
            $result = DB::select( DB::raw( $sql ) );
            $members_count = $result[ 0 ]->members;
        } else {
            $sql = "select count(*) as members from users where id=$id";
            $result = DB::select( DB::raw( $sql ) );
            $members_count = $result[ 0 ]->members;
        }
        $sql = "select sum(amount) as todays_income from payment where to_id=$id and service_status = 'In Payment' and paydate='$today' and ad_info='Activation' ";
        $result = DB::select( DB::raw( $sql ) );
        $todays_income = $result[ 0 ]->todays_income;
        if ( $todays_income == '' ) {
            $todays_income = 0;
        }

        $sql = "select sum(amount) as total_income from payment where to_id=$id and service_status = 'In Payment' and ad_info='Activation'";
        $result = DB::select( DB::raw( $sql ) );
        $total_income = $result[ 0 ]->total_income;
        if ( $total_income == '' ) {
            $total_income = 0;
        }
        $sql = "select wallet from users where id=$id";
        $result = DB::select( DB::raw( $sql ) );
        $wallet = $result[ 0 ]->wallet;
        $sql = "select * from users where referral_id=$id";
        $child = DB::select( DB::raw( $sql ) );

        if ( $usertype_id == 1 ) {
            $sql = "select count(*) as withdrawalpayment from withdrawal where status='Pending'";
            $result = DB::select( DB::raw( $sql ) );
            $withdrawalpayment = $result[ 0 ]->withdrawalpayment;
        } else {
            $sql = "select count(*) as withdrawalpayment from withdrawal where status='Pending' and user_id=$id";
            $result = DB::select( DB::raw( $sql ) );
            $withdrawalpayment = $result[ 0 ]->withdrawalpayment;

        }

        $data = [];
        if ( Auth::user()->id == 1 )
 {
            $r = $request->input( 'r', Auth::user()->id );
            $data[ 'primarymember' ] = User::find( $r );
            $members = [];
            $users = User::where( 'referral_id', $r )->where( 'id', '!=', Auth::user()->id )->get();
            $members[ 'u'.$r ] = $users;
            foreach ( $users as $user ) {
                $u = User::where( 'referral_id', $user->id )->get();
                $members[ 'u'.$user->id ] = $u;
                foreach ( $u as $i ) {
                    $v = User::where( 'referral_id', $i->id )->get();
                    $members[ 'u'.$i->id ] = $v;
                }
            }

        } else {

            $r = $request->input( 'r', Auth::user()->id );
            $data[ 'primarymember' ] = User::find( $r );
            $members = [];
            $users = User::where( 'referral_id', $r )->get();
            $members[ 'u'.$r ] = $users;
            foreach ( $users as $user ) {
                $u = User::where( 'referral_id', $user->id )->get();
                $members[ 'u'.$user->id ] = $u;
                foreach ( $u as $i ) {
                    $v = User::where( 'referral_id', $i->id )->get();
                    $members[ 'u'.$i->id ] = $v;
                }
            }
        }
        $data[ 'members' ] = json_encode( $members, true );
        $data[ 'members' ] = json_decode( $data[ 'members' ], true );
        $primarymember = $data[ 'primarymember' ];
        $members = $data[ 'members' ];

        return view( 'dashboard', compact( 'members_count', 'todays_income', 'total_income', 'wallet', 'child', 'requestpayment', 'withdrawalpayment', 'members', 'primarymember' ) );
    }

}
