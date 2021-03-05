@extends('students.layouts.student_master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                            <li><a href="{{route('student.dashboard')}}">Join Exam</a></li>
                            
                            
                        </ul>
                    </div>
                </div>

                   <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                          <h4 class="section-subtitle"><b>Join Exam</b></h4>
                                            <div class="panel">
                        <div class="panel-content">
                        	<div class="row">
                        		<div class="col-sm-4"><h3> Time: 1 Hrs</h3></div>
                        		<div class="col-sm-4"><h3 class="text-center"> <span class="js-timeout">60:00</span> </h3></div>

                        		<div class="col-sm-4"> <h3 class="text-right">Status: Running</h3> </div>
                        	</div>
                           
                </div>
            </div>


                        <div class="panel">
                        <div class="panel-content">
                            <form action="{{route('question.submit')}}" method="post">
                                @csrf
                        	<div class="row">
                                <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                        	<div class="col-sm-12">


                                @foreach($questions as $key => $question)

                        		<p> <b>{{$key+1}} : {{ $question['question'] }} </b></p>

                                <?php
                                $options =json_decode(json_encode(json_decode($question['options'])),true);
                                 ?>

                                 <input type="hidden" name="question{{$key+1}}" value="{{ $question['id'] }}">

                        		<ul class="question_option">
                        			<li> <input type="radio" value="{{$options['option1']}}" name="ans{{$key+1}}">{{$options['option1']}}</li>
                        			<li> <input type="radio" value="{{$options['option2']}}" name="ans{{$key+1}}">{{$options['option2']}}</li>
                        			<li> <input type="radio" value="{{$options['option3']}}" name="ans{{$key+1}}">{{$options['option3']}}</li>
                        			<li> <input type="radio" value="{{$options['option4']}}" name="ans{{$key+1}}">{{$options['option4']}}</li>
                                    <li style="display: none;"> <input value="0"  type="radio" checked="checked" name="ans{{$key+1}}">{{$options['option4']}}</li>
                        		</ul>

                                @endforeach
                        	</div>
                        	
                        	<div class="col-sm-12 mt-4">
                                <input type="hidden" name="index" value="<?php echo $key+1; ?>">
                        		<button type="submit" class="btn btn-info btn-block">Submit</button>
                        	</div>

                        	</div>
                        </form>
                           
                </div>
            </div>

        </div>



    </div>

        





  @endsection
