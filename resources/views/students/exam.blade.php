@extends('students.layouts.student_master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                            <li><a href="{{route('student.dashboard')}}">Exams</a></li>
                            
                            
                        </ul>
                    </div>
                </div>

                   <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                          <h4 class="section-subtitle"><b>Exams</b></h4>
                                            <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        	

                        		<thead>
                        			<th>#</th>
                        			<th>Exam title</th>
                        			<th>Exam Date</th>
                              <th>Status</th>
                              <th>Result</th>
                              <th>Action</th>
                        		</thead>


                        		<tbody>
                                <td>#</td>
                            <td>{{$student_info->title}}</td>
                            <td>{{$student_info->exam_date}}</td>
                            <td><?php 
                            if (strtotime($student_info->exam_date)<strtotime(date('d M Y'))) {
                               echo "completed";
                             }
                             elseif(strtotime($student_info->exam_date)==strtotime(date('d M Y')))
                             {
                              echo "Running";
                             }
                             else
                             {
                              echo "pending";

                             }
                              ?></td>
                              <td>
                                <?php
                                if($exam_join)
                                {
                                  echo $exam_join->yes_ans.'/'.($exam_join->yes_ans+$exam_join->no_ans);
                                }

                                 ?>
                              </td>
                              <?php
                              if(strtotime($student_info->exam_date)==strtotime(date('d M Y')))
                               {
                                if(!$exam_join){
                                 ?> 
                                }
                              <td><a href="{{route('student.join_exam', $student_info->exam)}}" class="btn btn-primary">Join Exam</a></td> <?php } }
                             

                              ?>
                            
                              
                      
                        		</tbody>
                          




                        		<tfoot>
                              <th>#</th>
                        			<th>Exam title</th>
                        			<th>Exam Date</th>
                              <th>Status</th>
                              <th>Result</th>
                              <th>Action</th>
                        		</tfoot>
                        	</table>



                    </div>
                </div>
            </div>
        </div>



    </div>

        





  @endsection
