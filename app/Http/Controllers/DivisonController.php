<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;


class DivisonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $divison = DB::table('division_list')->orderBy('id','desc')->get();

        return view('divison/divison',compact('divison'));
        
    }

    public function AddDivison(Request $request){

        $adddivison = DB::table('division_list')->insert([
            'division_name'     =>   $request->division_name,
            'school_id'         =>   auth()->user()->school_id,
            'status'            =>   1,
       // 'login_id'        =>   auth()->user()->id,
        ]);

        return redirect('/divison')->with('success', 'divison Added Successfully'); 
    }

    public function EditDivison(Request $request){

        $editdivison = DB::table('division_list')->where('id',$request->class_id)->update([
            'division_name'    =>   $request->division_name,
            'status'           =>   1,
            'updated_at'       =>   date('Y-m-d H:i:s'),
        //'login_id'        =>   auth()->user()->id,
        ]);

        return redirect('/divison')->with('success', 'Divison Updated Successfully'); 
    }
    public function DeleteDivison($id){
        $deletedivison = DB::table('division_list')->where('id',$id)->delete();
        
        return redirect('/divison')->with('success', 'Divison Deleted Successfully');
    }

}
