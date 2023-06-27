<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
use App\Models\User;

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

  public function joinus(Request $request){
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
    if(count($emailres) > 0){
      return redirect("/join/$referral_id")->with('name',$name)->with('phone',$phone)->with('email',$email)->with('password',$password)->with('password_confirmation',$password_confirmation)->with('terms',$terms)->with('error', 'Email address already used by another member');
    }elseif(count($phoneres) > 0){
      return redirect("/join/$referral_id")->with('name',$name)->with('phone',$phone)->with('email',$email)->with('password',$password)->with('password_confirmation',$password_confirmation)->with('terms',$terms)->with('error', 'Phone number already used by another member');
    }elseif($password != $password_confirmation){
      return redirect("/join/$referral_id")->with('error', 'Passwords does not match');
    }else{
      $sql = "select * from users where referral_id = '$referral_id'";
      $result = DB::select(DB::raw($sql));
      if(count($result) > 0){
        $parent_id = $result[0]->id;
      }
      $parent_id = self::get_parent_id($parent_id);
      $referral_id = uniqid();
      $passwordhash = Hash::make($password);
      $created_at = date("Y-m-d H:i:s");
      $sql = "insert into users (parent_id,name,phone,email,plain_password,password,referral_id,usertype_id,created_at) values ($parent_id,'$name','$phone','$email','$password','$passwordhash','$referral_id','2','$created_at')";
      DB::insert(DB::raw($sql));
      $id = DB::getPdo()->lastInsertId();
      Auth::loginUsingId($id);
      return redirect("/dashboard");
    }
  }

  private function get_parent_id($start){
    $ret_value = 0;
    $sql = "select id from users where id >= $start order by id";
    $result = DB::select(DB::raw($sql));
    foreach($result as $res){
      $parent_id = $res->id;
      $sql2 = "select count(*) as members from users where parent_id=$parent_id";
      $result2 = DB::select(DB::raw($sql2));
      if($result2[0]->members < 5){
        $ret_value = $parent_id;
        break;
      }
    }
    return $ret_value;
  }
  
  public function members(){
    $members = DB::table( 'users' )->where( 'status', '=', 'Active' )->orderBy( 'id', 'Asc' )->get();
    return view( 'users/index', compact('members'));
  }

  public function geneology(Request $request){
    $data = [];
    if(Auth::user()->id == 1)
    {
      $r = $request->input('r', Auth::user()->id);
      $data['primarymember'] = User::find($r);
      $members = [];
      $users = User::where('parent_id', $r)->where('id', '!=', Auth::user()->id)->get();
      $members['u'.$r] = $users;
      foreach($users as $user) {
                // if($user->id != Auth::user()->id)
                // {
        $u = User::where('parent_id', $user->id)->get();
        $members['u'.$user->id] = $u;
        foreach($u as $i) {
          $v = User::where('parent_id', $i->id)->get();
          $members['u'.$i->id] = $v;
        }
                // }
      }   
    } else {        
      $r = $request->input('r', Auth::user()->id);
      $data['primarymember'] = User::find($r);
      $members = [];
      $users = User::where('parent_id', $r)->get();
      $members['u'.$r] = $users;
      foreach($users as $user) {
                // if($user->id != Auth::user()->id)
                // {
        $u = User::where('parent_id', $user->id)->get();
        $members['u'.$user->id] = $u;

        foreach($u as $i) {
          $v = User::where('parent_id', $i->id)->get();
          $members['u'.$i->id] = $v;
        }
                // }
      }
    }


    $data['members'] = json_encode($members, true);

    $data['members'] = json_decode($data['members'], true);

    //log::info($data['members']);
    $primarymember = $data['primarymember'];
    $members = $data['members'];

    return view('users/geneology',compact('members','primarymember'));
  }
}
