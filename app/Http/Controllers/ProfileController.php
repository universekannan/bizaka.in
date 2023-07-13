<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
     {
      $userid = Auth::user()->id; 
      $proile = DB::table('users')->where('id','=', $userid)->get();
     return view('users/profile', compact('profile'));

    }
}
