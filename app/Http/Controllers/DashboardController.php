<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $members = 0;
        $sql = " select count(*) as members from users";
        $result = DB::select(DB::raw($sql));
        if (count($result) > 0) {
            $members = $result[0]->members;
        }
        return view("dashboard",compact('members'));
    }
}
