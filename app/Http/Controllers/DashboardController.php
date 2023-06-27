<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $id = Auth::user()->id;
        $usertype_id = Auth::user()->usertype_id;
        $members = 0;
        if($usertype_id == 1)
            $sql = "select count(*) as members from users where usertype_id=2";
        else
            $sql = "select count(*) as members from users where parent_id=$id";
        $result = DB::select(DB::raw($sql));
        if (count($result) > 0) {
            $members = $result[0]->members;
        }
        $sql = "select * from users where parent_id=$id";
        $child = DB::select(DB::raw($sql));
        return view("dashboard",compact('members','child'));
    }
    
}
