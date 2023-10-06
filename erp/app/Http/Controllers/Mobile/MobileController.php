<?php
namespace App\Http\Controllers\Mobile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
use Jenssegers\Agent\Agent;

class MobileController extends Controller
 {
   
    public function walletlogin() {

        $agent = new Agent();
        if ( $agent->isMobile() ) {

             return view( 'mobile/signin' );
        }
    }

    public function walletdashboard() {
      if (Auth::user()) {
        if(Auth::user()->usertype_id != 3){
            Auth::logout();
            return redirect ('/login');
        }

        $id = Auth::user()->id;
        $today = date( 'Y-m-d' );
        $sql = "select sum(amount) as todays_income from payment where to_id=$id and service_status = 'In Payment' and paydate='$today'";
        $result = DB::select( DB::raw( $sql ) );
        $todays_income = $result[ 0 ]->todays_income;
        if ( $todays_income == '' ) {
            $todays_income = 0;
        }

        $sql = "select sum(amount) as total_income from payment where to_id=$id and service_status = 'In Payment'";
        $result = DB::select( DB::raw( $sql ) );
        $total_income = $result[ 0 ]->total_income;
        if ( $total_income == '' ) {
            $total_income = 0;
        }

        $sql = "select sum(amount) as withdrawal_income from withdrawal where user_id=$id and status = 'Completed'";
        $result = DB::select( DB::raw( $sql ) );
        $withdrawal_income = $result[ 0 ]->withdrawal_income;
        if ( $withdrawal_income == '' ) {
            $withdrawal_income = 0;
        }

        $agent = new Agent();
        if ( $agent->isMobile() ) {
        return view( 'mobile/dashboard',compact('todays_income','today','total_income','withdrawal_income'));
        }
        }else{
          $agent = new Agent();
          if ( $agent->isMobile() ) {
            return redirect( 'walletlogin');
            }
        }
    }

    public function change(){
        $agent = new Agent();
        if ( $agent->isMobile() ) {
        return view( 'mobile/changepassword' );
        }
    }

    public function passwordupdate(Request $request){
        $userid = Auth::user()->id;
        $old_password = trim($request->get("oldpassword"));
        $currentPassword = auth()->user()->password;
        if(Hash::check($old_password, $currentPassword)){
          $new_password = trim($request->get("new_password"));
          $confirm_password = trim($request->get("confirm_password"));
          if($new_password != $confirm_password){
            return redirect('passwordchange')->with('error', 'Passwords does not match');
          }else{
            $updatepass = DB::table('users')->where('id', '=', $userid)->update([
              'password'            => Hash::make($new_password),
              'plain_password'      => $request->new_password,
            ]);
            return redirect('walletdashboard')->with('success', 'Passwords Change Succesfully');
          }
        }else{
          return redirect('passwordchange')->with('error', 'Sorry, your current password was not recognised');
        }
      }
   
    public function walletlogout(){

        Auth::logout();
        return view( 'mobile/signin' );
    }
}
