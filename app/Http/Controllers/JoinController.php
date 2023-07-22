<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
use App\Models\User;

class JoinController extends Controller
{

//public function __construct()
//{
//$this->middleware( 'auth' );
//}
  
  
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
      $joined_date = date("Y-m-d");
      $sql = "insert into users (parent_id,name,phone,email,plain_password,password,referral_id,usertype_id,created_at,joined_date) values ($parent_id,'$name','$phone','$email','$password','$passwordhash','$referral_id','2','$created_at','$joined_date')";
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
    $parent_id = Auth::user()->id;
    $sql = "";
    $childcount = 0;
    $sql = "select count(*) as childcount from users where parent_id=$parent_id";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $childcount = $result[0]->childcount;
    }
    if($parent_id == 1)
      $sql = "select * from users where usertype_id = 2 order by parent_id,id";
    else
      $sql = "select * from users where parent_id = $parent_id order by id";
    $members = DB::select(DB::raw($sql));
    return view( 'users/index', compact('members','childcount'));
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
        $u = User::where('parent_id', $user->id)->get();
        $members['u'.$user->id] = $u;
        foreach($u as $i) {
          $v = User::where('parent_id', $i->id)->get();
          $members['u'.$i->id] = $v;
        }
      }   
    } else {        
      $r = $request->input('r', Auth::user()->id);
      $data['primarymember'] = User::find($r);
      $members = [];
      $users = User::where('parent_id', $r)->get();
      $members['u'.$r] = $users;
      foreach($users as $user) {
        $u = User::where('parent_id', $user->id)->get();
        $members['u'.$user->id] = $u;
        foreach($u as $i) {
          $v = User::where('parent_id', $i->id)->get();
          $members['u'.$i->id] = $v;
        }
      }
    }
    $data['members'] = json_encode($members, true);
    $data['members'] = json_decode($data['members'], true);
    $primarymember = $data['primarymember'];
    $members = $data['members'];
    return view('users/geneology',compact('members','primarymember'));
  }

  public function addmember(Request $request){
    $name = $request->name;
    $phone = trim($request->phone);
    $email = trim($request->email);
    $sql = "select * from users where email = '$email'";
    $emailres = DB::select(DB::raw($sql));
    $sql = "select * from users where phone = '$phone'";
    $phoneres = DB::select(DB::raw($sql));
    if(count($emailres) > 0){
      return redirect("/members")->with('error', 'Email address already used by another member');
    }elseif(count($phoneres) > 0){
      return redirect("/members")->with('error', 'Phone number already used by another member');
    }else{
      $parent_id = Auth::user()->id;
      $referral_id = uniqid();
      $password = rand(1001,9999);
      $passwordhash = Hash::make($password);
      $created_at = date("Y-m-d H:i:s");
      $joined_date = date("Y-m-d");
      $sql = "insert into users (parent_id,name,phone,email,plain_password,password,referral_id,usertype_id,created_at,joined_date) values ($parent_id,'$name','$phone','$email','$password','$passwordhash','$referral_id','2','$created_at','$joined_date')";
      DB::insert(DB::raw($sql));
      return redirect("/members")->with('success', 'Member added successfully');
    }
  }

  public function updatemember(Request $request){
    $id = $request->member_id;
    $name = $request->name;
    $phone = trim($request->phone);
    $email = trim($request->email);
    $sql = "select * from users where email = '$email' and id <> $id";
    $emailres = DB::select(DB::raw($sql));
    $sql = "select * from users where phone = '$phone' and id <> $id";
    $phoneres = DB::select(DB::raw($sql));
    if(count($emailres) > 0){
      return redirect("/members")->with('error', 'Email address already used by another member');
    }elseif(count($phoneres) > 0){
      return redirect("/members")->with('error', 'Phone number already used by another member');
    }else{
      $updated_at = date("Y-m-d H:i:s");
      $sql = "update users set name='$name',email='$email',phone='$phone',updated_at='$updated_at' where id = $id";
      DB::insert(DB::raw($sql));
      return redirect("/members")->with('success', 'Member updated successfully');
    }
  }

  public function ownactivation($referral_id){
    $log_id = Auth::user()->id;
    $paydate = date('Y-m-d');
    $time = date("H:i:s");
    $amount = 300;
    $member_id = 0;
    $child_id = 0;
    $parent_id = 0;
    $wallet = 0;
    $sql = "select * from users where referral_id = '$referral_id'";
    $result = DB::select(DB::raw($sql));
    if(count($result) > 0){
      $member_id = $result[0]->id;
      $child_id = $result[0]->id;
      $parent_id = $result[0]->parent_id;
    }
    $ad_info = "Activation";
    $service_status = "Out Payment";
    $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$parent_id','$child_id', '$amount','$ad_info', '$service_status','$time','$paydate')";
    DB::insert(DB::raw($sql));
    $sql = "update users set wallet = wallet - $amount where id = $child_id";
    DB::update(DB::raw($sql));
    do{
      $sql = "select * from users where id = $child_id";
      $result = DB::select(DB::raw($sql));
      if(count($result) > 0){
        $child_id = $result[0]->id;
        $parent_id = $result[0]->parent_id;
      }
      if($parent_id != 1) $amount = $amount/2;
      $ad_info = "Activation";
      $service_status = "In Payment";
      $sql = "insert into payment (log_id,from_id,to_id,amount,ad_info,service_status,time,paydate) values ('$log_id','$child_id','$parent_id', '$amount','$ad_info', '$service_status','$time','$paydate')";
      DB::insert(DB::raw($sql));
      $sql = "update users set wallet = wallet + $amount where id = $parent_id";
      DB::update(DB::raw($sql));
      $child_id = $parent_id;
    }while($parent_id != 1);
    $sql = "update users set status = 2 where id = $member_id";
    DB::update(DB::raw($sql));
    return redirect("/members")->with('success', 'Member updated successfully');
  }

  public function todayincome(){
    $id = Auth::user()->id;
    $today = date("Y-m-d");
    $sql = "select a.*,b.name from payment a,users b where a.from_id=b.id and service_status = 'In Payment' and paydate='$today'";
    $income = DB::select(DB::raw($sql));
    return view('todayincome',compact('income'));
  }

  public function totalincome(){
    $id = Auth::user()->id;
    $sql = "select a.*,b.name from payment a,users b where a.from_id=b.id and to_id=$id and service_status = 'In Payment' order by paydate desc";
    $income = DB::select(DB::raw($sql));
    return view('totalincome',compact('income'));
  }

public function changepassword()
{
  $userid = Auth::user()->id; 
  return view('users/changepassword');
}

public function updatepassword(Request $request){
  $userid = Auth::user()->id;
  $old_password = trim($request->get("oldpassword"));
  $currentPassword = auth()->user()->password;
  if(Hash::check($old_password, $currentPassword)){
    $new_password = trim($request->get("new_password"));
    $confirm_password = trim($request->get("confirm_password"));
    if($new_password != $confirm_password){
      return redirect('changepassword')->with('error', 'Passwords does not match');
    }elseif($new_password == '12345678'){
      return redirect('changepassword')->with('error', 'You cannot use the passord 12345678');
    }else{
      $updatepass = DB::table('users')->where('id', '=', $userid)->update([
        'password' => Hash::make($new_password),
        'pas'      => $request->new_password,
      ]);
      return redirect('dashboard')->with('success', 'Passwords Change Succesfully');
    }
  }else{
    return redirect("changepassword")->with('error', 'Sorry, your current password was not recognised');
  }
}

        public function logout(){
            Auth::guard()->logout();
            return redirect()->intended('/');
        }

}
