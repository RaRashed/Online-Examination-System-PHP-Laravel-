<?php

namespace App\Http\Controllers;
use App\Oex_student;
use App\Question;
use App\Model\Result;
use Validator;
use Session;

use Illuminate\Http\Request;

class StudentsOperation extends Controller
{
	public function student_dashboard()
   {
   	if(!Session::get('student_session'))

   	{
   			return redirect()->route('student.signin');
   		

   	}
 

  return view('students.student_dashboard');
   }
      public function exams()
   {
      $student_info=Oex_student::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')->where('oex_students.id',Session::get('student_session'))->get()->first();
      $exam_join=Result::where('exam_id',$student_info->exam)->where('user_id',Session::get('student_session'))->get()->first();



      return view('students.exam',['student_info'=>$student_info,'exam_join'=>$exam_join]);
   }


   public function join_exam($id)
   {
      $data['questions'] = Question::where('exam_id', $id)->get()->toArray();
   	return view('students.join_exam',$data);
   }

   public function question_submit(Request $request)
   {
   	$yes_ans =0;
   	$no_ans=0;
   	$data=$request->all();
   	$result=array();
   	for($i=1;$i<=$request->index;$i++)
   	{
   		if (isset($data['question'.$i])) {
   			$question=Question::where('id',$data['question'.$i])->get()->first();
   			if($question->ans==$data['ans'.$i])
   			{
   				$result[$data['question'.$i]]='Yes';
   				$yes_ans++;
   			}
   			else
   			{
   				$result[$data['question'.$i]]='No';
   				$no_ans++;
   			}

   		}

   	}
   	$res = new Result();
   	$res->exam_id = $request->exam_id;
   	$res->user_id = Session::get('student_session');
   	$res->yes_ans =$yes_ans;
   	$res->no_ans =$no_ans;
   	$res->result_json = json_encode($result);
   	$res->save();
   	return redirect()->route('show_result',$res->id);

   	
   }
   public function show_result($id)
   {
   	$data['result_info'] = Result::where('id',$id)->get()->first();
   	 $data['student_info']=Oex_student::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')->where('oex_students.id',Session::get('student_session'))->get()->first();
   	return view('students.show_result',$data);
   }

 
}
