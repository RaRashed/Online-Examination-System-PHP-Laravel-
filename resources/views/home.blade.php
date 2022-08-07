<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('assets/css/css.css')}}">
      <!--Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet">
 <!--Custom css -->

    <title>Online exam</title>
</head>
<body>

      <!--Start  Video Backgroun-->
      <div class="container-fluid remove-video-marg">
        <div class="video-play">
          <video playinline autoplay muted loop>
            <source src="{{ asset('assets/video/video.mp4') }}" type="">
          </video>
          <div class="video-overlay"></div>
        </div>
        <div class="video-content">
            <h1 class="my-content">Welcome to Library Management System</h1>
            <small class="my-content"> Learn, Learn and Learn</small><br>

            <div class="container mt-5">
                <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="details">
                        <h1 class="pro-design">For Admin</h1>
                        <br>
                        <p class="text">Admin Can Manage user portal, exam, exam date etc</p>
                        <hr>

                        <a class="btn btn-primary btn-lg"  href="{{ route('admin.login') }}">Admin Panel</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="details">

                        <h1 class="pro-design">Students Portal</h1>
                        <br>
                        <p class="text">Students can see all exam details and date. they will choose exam to attend. </p>
                        <hr>
                        <a class="btn btn-primary btn-lg"  href="{{ route('user.sign_up') }}">User Portal</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="details">

                        <h1 class="pro-design">Exam</h1>
                        <br>
                        <p class="text"> Students can see their exam date here </p>
                        <hr>
                        <a class="btn btn-primary btn-lg"  href="{{ route('student.signup') }}">Students</a>


                    </div>
                </div>
            </div>




          </div>




            </div>
        </div>









       {{-- <div class="video-content">
          <h1 class="my-content">Welcome to Library Management System</h1>
          <small class="my-content"> Learn, Learn and Learn</small><br>

           <a class="btn btn-primary"  href="student/">Students</a>
          <a class="btn btn-primary" href="librarian/">Librarian</a>

        </div> --}}
      </div>






</body>
</html>


