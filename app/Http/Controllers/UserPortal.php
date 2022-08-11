<?php

namespace App\Http\Controllers;
use App\Oex_Portal;
use Validator;
use Session;

use Illuminate\Http\Request;

class UserPortal extends Controller
{
   public function sign_up()
   {
   		if(Session::get('portal_session'))

   	{
   			return redirect(url('portal/dashboard'));


   	}
   	return view('admin.users.user_signup');
   }
   public function sign_in()
   {
   			if(Session::get('portal_session'))

   	{
   			return redirect(url('portal/dashboard'));


   	}
   	return view('admin.users.signin');
   }

   public function new_user_portal(Request $request)
   {
  $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
   	if ($validator->passes())
   	 {
   	 	$is_exists = Oex_portal::where('email',$request->email)->get()->toArray();
   	 	if($is_exists)
   	 	{
   	 		$arr = array('status'=>'false','message'=>'Emai already has exists');
   	 	}
   	 	else
   	 	{
   	 				$portal = new Oex_portal();

   		$portal->name= $request->name;
   		$portal->email= $request->email;
   		$portal->mobile_no= $request->mobile_no;
   		$portal->password = $request->password;
   		$portal->save();



   	$arr=array('status'=>'true','message'=>'successfully Registration done','reload'=>url('portal/user/signin'));

   	 	}

   	}
   	else{
   		$arr=array('status'=>'false','message'=>$validator->errors()->all());

   	}
   	echo json_encode($arr);

   }
     public function login_portal(Request $request)
     {
      $portal = Oex_Portal::where('email',$request->email)->where('password',$request->password)->get()->toArray();
      if($portal)
      {
      	if($portal[0]['status']==1)
      	{
      		$request->session()->put('portal_session',$portal[0]['id']);
   	 		$arr = array('status'=>'true','message'=>'successfully login','reload'=>url('portal/dashboard'));
   	 	}
   	 	else
   	 	{
	$arr=array('status'=>'false','message'=>'Account is deactivated');

   	 	}


      }


   	else{
   		$arr=array('status'=>'false','message'=>'Email And Password not matched.');

   	}
   	echo json_encode($arr);

     }
}
