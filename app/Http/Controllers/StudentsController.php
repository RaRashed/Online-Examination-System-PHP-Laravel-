<?php

namespace App\Http\Controllers;
use App\Oex_student;
use Validator;
use Session;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
   public function signup()
   {
   		if(Session::get('student_session'))

   	{
   			return redirect(url('student/dashboard'));
   		

   	}
   	return view('students.signup');
   }
   public function signin()
   {
   			if(Session::get('student_session'))

   	{
   			return redirect(url('student/dashboard'));
   		

   	}
   	return view('students.signin');
   }

   public function new_student(Request $request)
   {
  $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
   	if ($validator->passes())
   	 {
   	 	$is_exists = Oex_student::where('email',$request->email)->get()->toArray();
   	 	if($is_exists)
   	 	{
   	 		$arr = array('status'=>'false','message'=>'Emai already has exists');
   	 	}
   	 	else
   	 	{
   	 				$student = new Oex_student();

   		$student->name= $request->name;
   		$student->email= $request->email;
   		$student->mobile_no= $request->mobile_no;
   		$student->password = $request->password;
   		$student->save();



   	$arr=array('status'=>'true','message'=>'successfully Registration done','reload'=>url('student/signin'));

   	 	}
   
   	}
   	else{
   		$arr=array('status'=>'false','message'=>$validator->errors()->all());

   	}
   	echo json_encode($arr);

   }
     public function login_student(Request $request)
     {
      $student = Oex_student::where('email',$request->email)->where('password',$request->password)->get()->toArray();	
      if($student)
      {
      	if($student[0]['status']==1)
      	{
      		$request->session()->put('student_session',$student[0]['id']);
   	 		$arr = array('status'=>'true','message'=>'successfully login','reload'=>url('student/dashboard'));
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




    public function student_logout(Request $request)
   {
      $request->session()->forget('student_session');
         return redirect()->route('student.signin');
      
   }
  
}
