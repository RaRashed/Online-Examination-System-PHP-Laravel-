<?php

namespace App\Http\Controllers;
use App\Oex_Portal;
use Validator;

use Illuminate\Http\Request;

class Portal extends Controller
{
   public function manage_portal()
   {
      $data['portals'] = Oex_Portal::orderBy('id','desc')->get()->toArray();
return view('admin.portals.manage_portal',$data);
   }


public function add_portal(Request $request)
   {
  $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
   	if ($validator->passes())
   	 {
   		$portal = new Oex_portal();

   		$portal->name= $request->name;
   		$portal->email= $request->email;
   		$portal->mobile_no= $request->mobile_no;
   		$portal->password = $request->password;
   		$portal->status=1;
   		$portal->save();



   	$arr=array('status'=>'true','message'=>'successfully Added Portal','reload'=>url('admin/manage_portal'));
   	}
   	else{
   		$arr=array('status'=>'false','message'=>$validator->errors()->all());

   	}
   	echo json_encode($arr);

   }
    public function portal_status($id)
   {
      $portal = Oex_Portal::where('id',$id)->get()->first();
      if($portal->status==1)
         $status=0; 
      else
         $status=1;
      $portal1=Oex_Portal::where('id',$id)->get()->first();
      $portal1->status=$status;
      $portal1->update();

   }
public function portal_delete($id)
{

   $portal =Oex_Portal::where('id',$id)->get()->first();
      $portal->delete();
      return redirect()->route('admin.manage_portal');
}
public function portal_edit($id)
{
      $data['portal']=Oex_Portal::where('id',$id)->get()->first();
       

 
      return view('admin.portals.portal_edit',$data);
}
public function edit_new_portal(Request $request)
{
         $portal=Oex_Portal::where('id',$request->id)->get()->first();
      $portal->name = $request->name;
            $portal->email = $request->email;
            $portal->mobile_no = $request->mobile_no;
            $portal->password = $request->password;
     
          $portal->update();
        echo json_encode(array('status'=>'true','message'=>'successfully updated ','reload'=>url('admin/manage_portal')));

}






   
}
