<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class LoginController extends Controller
 {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct()
 {
        $this->middleware( 'guest' )->except( 'logout' );
    }

    public function welcome(){
        return view('welcome');
    }

    public function login( Request $request ) {
        $message = '';
        $email = array( 'email' => $request->email, 'password' => $request->password );
        if ( Auth::attempt( $email ) ) {
            Auth::loginUsingId( Auth::user()->id );
          if(Auth::user()->usertype_id == 3){
                return redirect( 'walletdashboard' )->with( 'message', $message );
          }else{
            return redirect( 'dashboard' )->with( 'message', $message );
          }
        } else {
            $message = 'Email or Password is incorrect';
            $usertype = DB::table('users')->select('usertype_id')->where( 'email', '=', $request->email )->get();
            $usertypeid = $usertype[0]->usertype_id;
            if($usertypeid == 3){
                return redirect( '/walletlogin' )->with( 'message', $message )->withInput();
            }else{
            return redirect( '/' )->with( 'message', $message );
            }
            
        }

    }

    public function walletlogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect( '/walletlogin' );
    }
} 