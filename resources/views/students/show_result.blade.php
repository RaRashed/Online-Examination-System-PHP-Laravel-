
<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Result</title>
  
   @include('admin.partials.styles')
</head>

<body>
<div class="wrap">
    
    <div class="page-body animated slideInDown">
       
      
        <div class="text-center">
           <b>Exam Name: {{$student_info->title}}</b>
                     </div>

        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <h3>Basic Information</h3>

                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{$student_info->name}}</td>
                        </tr>
                          <tr>
                            <td>Email</td>
                            <td>{{$student_info->email}}</td>
                        </tr>
                          <tr>
                            <td>Phone Number</td>
                            <td>{{$student_info->mobile_no}}</td>
                        </tr>
                           <tr>
                            <td>Exam Date</td>
                            <td>{{$student_info->exam_date}}</td>
                        </tr>
                        
                    </table>

                    <table class="table">
                        <h3>Result Information</h3>
                        <tr>
                            <td>Pass Mark</td>
                            <td>5</td>
                        </tr>
                          <tr>
                            <td>fail Mark</td>
                            <td>Less than 3</td>
                        </tr>
                          <tr>
                            <td>Total Mark</td>
                            <td>{{$result_info->yes_ans}}</td>
                        </tr>
                        
                    </table>
                          <div class="form-group">
                        
                      <a href="{{route('student.dashboard')}}" class="btn btn-primary">Back Dashboard</a>

                        
                        </div>

                     
                </div>
            </div>
        </div>
        
    </div>
</div>

 @include('admin.partials.scripts')

</body>


</html>

