<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

class JoinController extends Controller
{
    public function join($referral_id){
        $name = "";
        $email = "";
        $phone = "";
        $terms = 0;
        $password = "";
        $password_confirmation = "";
        return view("join",compact('referral_id','name','email','phone','password','password_confirmation','terms'));
    }

    public function addmember(Request $request){
        $parent_id = 0;
        $terms = 1;
        $referral_id = $request->referral_id;
        $name = $request->name;
        $phone = trim($request->phone);
        $email = trim($request->email);
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        $sql = "select * from users where email = '$email'";
        $emailres = DB::select(DB::raw($sql));
        $sql = "select * from users where phone = '$phone'";
        $phoneres = DB::select(DB::raw($sql));
        /*if(count($emailres) > 0){
            return redirect("/join/$referral_id")->with('error', 'Please use a different email address');
        }elseif(count($phoneres) > 0){
            return redirect("/join/$referral_id")->with('error', 'Please use a different email address');
        }elseif($password != $password_confirmation){
            return redirect("/join/$referral_id")->with('error', 'Passwords does not match');
        }else{*/
            $sql = "select * from users where referral_id = '$referral_id'";
            $result = DB::select(DB::raw($sql));
            if(count($result) > 0){
                $parent_id = $result[0]->parent_id;
            }
            $parent_id = self::get_parent_id($parent_id);

            $referral_id = uniqid();
            $passwordhash = Hash::make($password);
            $created_at = date("Y-m-d H:i:s");
            $sql = "insert into users (parent_id,name,phone,email,plain_password,password,referral_id,usertype_id,created_at) values ($parent_id,'$name','$phone','$email','$password','$passwordhash','$referral_id','2','$created_at')";
            DB::insert(DB::raw($sql));
            /*$id = DB::getPdo()->lastInsertId();
            Auth::loginUsingId($id);
            return redirect("/dashboard");*/
        //}
    }

    private function get_parent_id($parent_id){
        $ret_value = 1;
        $sql = "select parent_id,count(*) as members from users where parent_id > 0 group by parent_id";
        $result = DB::select(DB::raw($sql));
        foreach($result as $res){
            if($res->members < 5){
                $parent_id = $res->parent_id;
                break;
            }else{
                $parent_id = $res->parent_id;
                $sql3 = "select id from users where parent_id=$parent_id order by id limit 1";
                $result3 = DB::select(DB::raw($sql3));
                if(count($result3) > 0){
                    $ret_value = $result3[0]->id;
                }
                continue;
            }
        }
        return $ret_value;
    }

}
