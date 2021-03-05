<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oex_category;
use App\Oex_exam_master;
use App\Question;
use Validator;

class Admin extends Controller
{
   
   public function exam_category()
   {
   	$data['category'] = Oex_category::orderBy('id','desc')->get()->toArray();
   	return view('admin.exam_category',$data);

   }
   public function add_category(Request $request){
   	$validator=Validator::make($request->all(),['name'=>'required']);
   	if ($validator->passes())
   	 {
   		$cat = new Oex_category();
   		$cat->name = $request->name;
   		$cat->status=1;
   		$cat->save();
   		$arr=array('status'=>'true','message'=>'success','reload'=>url('admin/exam_category'));
   	}
   	else{
   		$arr=array('status'=>'false','message'=>$validator->errors()->all());

   	}
   	echo json_encode($arr);

   }
   public function category_delete($id)
   {
   	$cat =Oex_category::where('id',$id)->get()->first();
   	$cat->delete();
   	return redirect()->route('admin.exam_category');


   }
     public function category_edit($id)
   {
   	$category =Oex_category::where('id',$id)->get()->first();

   	return view('admin.exam_category_edit',['category'=>$category]);
   }

   public function edit_new_category(Request $request)
   {
   	

   	$cat = Oex_category::where('id', $request->id)->get()->first();
   	$cat->name = $request->name;
   	$cat->save();
   echo json_encode(array('status'=>'true','message'=>'successfully updated ','reload'=>url('admin/exam_category')));

   }
   public function category_status($id)
   {
   	$cat = Oex_category::where('id',$id)->get()->first();
   	if($cat->status==1)
   		$status=0; 
   	else
   		$status=1;
   	$cat1=Oex_category::where('id',$id)->get()->first();
   	$cat1->status=$status;
   	$cat1->update();

   }
   public function manage_exam(){
   	$data['category'] = Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
   	$data['exams'] = Oex_exam_master::orderBy('id','desc')->select(['oex_exam_masters.*','oex_categories.name as cat_name'])->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')->get()->toArray();
   	return view('admin.manage_exam',$data);
   }
  public function add_exam(Request $request)
  {
   	$validator=Validator::make($request->all(),['title'=>'required','category'=>'required','exam_date'=>'required']);
   	if ($validator->passes())
   	 {
   		$exam = new Oex_exam_master();
   		$exam->title = $request->title;
   		$exam->category = $request->category;
   		$exam->exam_date = $request->exam_date;
   		$exam->status=1;
   		$exam->save();



   		$arr=array('status'=>'true','message'=>'successfully Added exam','reload'=>url('admin/manage_exam'));
   	}
   	else{
   		$arr=array('status'=>'false','message'=>$validator->errors()->all());

   	}
   	echo json_encode($arr);

   }
   public function exam_status($id)
   {
   	$exam = Oex_exam_master::where('id',$id)->get()->first();
   	if($exam->status==1)
   		$status=0; 
   	else
   		$status=1;
   	$exam1=Oex_exam_master::where('id',$id)->get()->first();
   	$exam1->status=$status;
   	$exam1->update();

   }
   public function exam_delete($id)
   {
   	$exam =Oex_exam_master::where('id',$id)->get()->first();
   	$exam->delete();
   	return redirect()->route('admin.manage_exam');
   }
   public function exam_edit($id)
   {

   	$data['exam']=Oex_exam_master::where('id',$id)->get()->first();
   	 $data['category'] = Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();

   	return view('admin.exam_edit',$data);

   }
   public function edit_new_exam(Request $request)
   {
   	$exam=Oex_exam_master::where('id',$request->id)->get()->first();
   	$exam->title = $request->title;
   	$exam->category= $request->category;
   	$exam->exam_date=$request->exam_date;
   	$exam->update();
   	  echo json_encode(array('status'=>'true','message'=>'successfully updated ','reload'=>url('admin/manage_exam')));
   }

   public function exam_question($id)
   {
      $data['questions'] = Question::where('exam_id',$id)->get()->toArray();
      return view('admin.add_question',$data);
   }
   public function new_question(Request $request)
   {
     $validator=Validator::make($request->all(),['question'=>'required','option1'=>'required','option2'=>'required','option3'=>'required','option4'=>'required','ans'=>'required']);
      if ($validator->passes())
       {
         $question = new Question();
         $question->exam_id = $request->exam_id;
         $question->question = $request->question;
          $question->ans = $request->ans;
          $question->options= json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
          $question->status =1;


       
         $question->save();



         $arr=array('status'=>'true','message'=>'successfully Added question','reload'=>url('admin/exam/question/'.$request->exam_id));
      }
      else{
         $arr=array('status'=>'false','message'=>$validator->errors()->all());

      }
      echo json_encode($arr);

   }
   public function question_status($id)
   {
      $question = Question::where('exam_id',$id)->get()->first();
      if($question->status==1)
         $status=0; 
      else
         $status=1;
      $question1=Question::where('exam_id',$id)->get()->first();
      $question1->status=$status;
      $question1->update();

   }
     public function question_delete($id)
   {
      $question =Question::where('id',$id)->get()->first();
      $question->delete();
      return redirect()->route('admin.manage_exam');


   }
   public function question_update($id)
   {
     $data['question']=Question::where('id',$id)->get()->first();

     return view('admin.question_update',$data); 

   }
   public function question_new_update(Request $request)
   {
      $question=Question::where('id',$request->id)->get()->first();
     
         $question->question = $request->question;
          $question->ans = $request->ans;
          $question->options= json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
          


       
         $question->update();
        echo json_encode(array('status'=>'true','message'=>'successfully updated Question ','reload'=>url('admin/manage_exam')));

   }
}
