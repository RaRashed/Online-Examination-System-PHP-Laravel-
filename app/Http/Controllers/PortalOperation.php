<?php

namespace App\Http\Controllers;
use App\Oex_exam_master;
use App\Oex_student;
use Validator;
use Session;

use Illuminate\Http\Request;

class PortalOperation extends Controller
{
   public function dashboard()
   {
   	if(!Session::get('portal_session'))

   	{
   			return redirect()->route('user.sign_in');
   		

   	}
   	$data['exams']=Oex_exam_master::select('oex_exam_masters.*','oex_categories.name as $cat_name')->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')->orderBy('id','desc')->where('oex_exam_masters.status','1')->get()->toArray();

  return view('admin.users.dashboard',$data);
   }
   public function exam_form($id)

   {
      $exam = Oex_exam_master::where('id',$id)->get()->first(); 
       
      return view('admin.users.exam_form',['exam'=>$exam]);
   }
   public function form_submit(Request $request)
   
       {
      $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','dob'=>'required','password'=>'required']);
      if ($validator->passes())
       {
         $std = new Oex_student();
         $std->name = $request->name;
         $std->email = $request->email;
         $std->mobile_no = $request->mobile_no;
         $std->exam = $request->id;
          $std->dob = $request->dob;

         $std->password = $request->password;
         $std->save();



         $arr=array('status'=>'true','message'=>'successfully Added exam','reload'=>url('portal/exam_print/'.$std->id));
      }
      else{
         $arr=array('status'=>'false','message'=>$validator->errors()->all());

      }
      echo json_encode($arr);

   }
   public function print($id)
   {
      $student_info = Oex_student::where('id',$id)->get()->first();
      $exam = Oex_exam_master::where('id',$student_info->exam)->get()->first();

   return view('admin.users.print',['student_info'=>$student_info,'exam'=>$exam]);
   }


     public function update_form()
   {
     $data['exams']=Oex_exam_master::where('status','1')->get()->toArray();

   return view('admin.users.update_form',$data);
   }


   public function student_exam_info()
   {
      $data['exam_info']=Oex_exam_master::where('id',$_GET['exam'])->get()->first();
      $data['student_info'] = Oex_student::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->where('exam',$_GET['exam'])->get()->toArray();
      return view('admin.users.student_exam_info',$data);

   }
   public function student_info_edit(Request $request)
   {
      $std=Oex_student::where('id',$request->id)->get()->first();
      $std->name=$request->name;
      $std->email=$request->email;
      $std->mobile_no=$request->mobile_no;
      $std->dob=$request->dob;
      if($request->password)
      {
       $std->password=$request->password;
     }
     $std->update();
      echo json_encode(array('status'=>'true','message'=>'successfully updated ','reload'=>url('portal/update_form')));

   }

   public function portal_logout(Request $request)
   {
      $request->session()->forget('portal_session');
         return redirect()->route('user.sign_in');
      
   }
   
}
 