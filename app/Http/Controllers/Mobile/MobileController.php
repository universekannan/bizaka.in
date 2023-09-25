<?php
namespace App\Http\Controllers\Mobile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

class MobileController extends Controller
 {

    public function walletlogin() {
        return view( 'mobile/signin' );
    }

    public function dashboard() {
        return view( 'mobile/dashboard' );
    }
}
