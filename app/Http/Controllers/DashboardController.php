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
        $today = date("Y-m-d");
        $usertype_id = Auth::user()->usertype_id;
        $members = 0;
        $todays_income = 0;
        $total_income = 0;
        $wallet = 0;
        if($usertype_id == 1){
            $sql = "select count(*) as members from users where usertype_id=2";
            $result = DB::select(DB::raw($sql));
            $members = $result[0]->members;
        }else{
            $sql = "select count(*) as members from users where parent_id=$id";
            $result = DB::select(DB::raw($sql));
            $members = $result[0]->members;
        }
        $sql = "select sum(amount) as todays_income from payment where to_id=$id and service_status = 'In Payment' and paydate='$today'";
        $result = DB::select(DB::raw($sql));
        $todays_income = $result[0]->todays_income;
        $sql = "select sum(amount) as total_income from payment where to_id=$id and service_status = 'In Payment'";
        $result = DB::select(DB::raw($sql));
        $total_income = $result[0]->total_income;
        $sql = "select wallet from users where id=$id";
        $result = DB::select(DB::raw($sql));
        $wallet = $result[0]->wallet;
        $sql = "select * from users where parent_id=$id";
        $child = DB::select(DB::raw($sql));
        return view("dashboard",compact('members','todays_income','total_income','wallet','child'));
    }
    
}
