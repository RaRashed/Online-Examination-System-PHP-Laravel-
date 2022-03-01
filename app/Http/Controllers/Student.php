<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oex_exam_master;
use App\Oex_student;
use App\Model\Result;
use Validator;
class Student extends Controller
{
   public function manage_student(){
   	$data['exams'] = Oex_exam_master::where('status','1')->get()->toArray();
   	$data['students'] = Oex_student::select(['oex_students.*','oex_exam_masters.title as ex_name','oex_exam_masters.exam_date'])->orderBy('id','desc')
   	->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
   	->get()->toArray();
      $data['exam_join']=Result::orderBy('id')->get()->toArray();


   	return view('admin.students.manage_student',$data);
   }

    public function add_student(Request $request)
  {
   	$validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','dob'=>'required','exam'=>'required','password'=>'required']);
   	if ($validator->passes())
   	 {
   		$student = new Oex_student();
   		$student->name= $request->name;
   		$student->email= $request->email;
   		$student->mobile_no= $request->mobile_no;
   		$student->dob = $request->dob;
   		$student->exam = $request->exam;
   		$student->password = $request->password;
   		$student->status=1;
   		$student->save();



   		$arr=array('status'=>'true','message'=>'successfully Added student','reload'=>url('admin/manage_student'));
   	}
   	else{
   		$arr=array('status'=>'false','message'=>$validator->errors()->all());

   	}
   	echo json_encode($arr);

   }
   public function student_delete($id)
   {
   	   	$student =Oex_student::where('id',$id)->get()->first();
   	$student->delete();
   	return redirect()->route('admin.manage_student');
   }

   public function student_edit($id)

   {
   	 	$data['student']=Oex_student::where('id',$id)->get()->first();
   	 $data['exams'] = Oex_exam_master::where('status','1')->get()->toArray();


   	return view('admin.students.student_edit',$data);
   }
   public function edit_new_student(Request $request)
   {
   	 	$student=Oex_student::where('id',$request->id)->get()->first();
   	$student->name = $request->name;
   	$student->email= $request->email;
   	$student->mobile_no=$request->mobile_no;
   	$student->dob= $request->dob;
   		$student->exam= $request->exam;
   			$student->password= $request->password;




   	$student->update();
   	  echo json_encode(array('status'=>'true','message'=>'successfully updated ','reload'=>url('admin/manage_student')));
   }

   public function single_student($id)
   {


   	 	$data['student']=Oex_student::where('id',$id)->get()->first();



   	return view('admin.students.single_student',$data);
   }

   public function student_status($id)
   {
      $student_status = Oex_student::where('id',$id)->get()->first();
      if($student_status->status==1)
         $status=0;
      else
         $status=1;
      $student_status1=Oex_student::where('id',$id)->get()->first();
      $student_status1->status=$status;
      $student_status1->update();

   }

}
