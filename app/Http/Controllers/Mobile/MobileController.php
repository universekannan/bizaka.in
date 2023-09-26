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

        return view( 'mobile/dashboard' );
    }
}
