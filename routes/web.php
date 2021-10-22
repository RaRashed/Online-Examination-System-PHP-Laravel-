<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.login');
});


Auth::routes();

//Admin Exam Category
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/exam_category', 'Admin@exam_category')->name('admin.exam_category');
Route::post('/admin/new_category', 'Admin@add_category')->name('admin.new_category');
Route::get('/category/delete/{id}', 'Admin@category_delete')->name('category.delete');
Route::get('/category/edit/{id}', 'Admin@category_edit')->name('category.edit');
Route::post('/admin/edit_new_category', 'Admin@edit_new_category');
Route::get('/admin/category_status/{id}', 'Admin@category_status');


//Admin Manage Exam

Route::get('/admin/manage_exam', 'Admin@manage_exam')->name('admin.manage_exam');
Route::post('/admin/new_exam', 'Admin@add_exam')->name('admin.new_exam');
Route::get('/admin/exam_status/{id}', 'Admin@exam_status');
Route::get('/admin/exam/delete/{id}','Admin@exam_delete')->name('exam.delete');
Route::get('/admin/exam/edit/{id}','Admin@exam_edit')->name('exam.edit');
Route::post('/admin/edit_new_exam','Admin@edit_new_exam');
Route::get('/admin/exam/question/{id}','Admin@exam_question')->name('exam.question');
Route::post('/admin/exam/new_question','Admin@new_question')->name('exam.new_question');
Route::get('/admin/question_status/{id}', 'Admin@question_status');
Route::get('/admin/question/delete/{id}','Admin@question_delete')->name('question.delete');
Route::get('/admin/question/update/{id}','Admin@question_update')->name('question.update');
Route::post('/admin/question/new_update','Admin@question_new_update')->name('question.new_update');



//Admin Manage Student
Route::get('/admin/manage_student','Student@manage_student')->name('admin.manage_student');
Route::post('/admin/new_student', 'Student@add_student')->name('admin.new_student');
Route::get('/admin/student_delete/{id}','Student@student_delete')->name('student.delete');
Route::get('/admin/student/edit/{id}','Student@student_edit')->name('student.edit');
Route::post('/admin/edit_new_student','Student@edit_new_student')->name('admin.edit_new_student');
Route::get('/admin/student/show/{id}','Student@single_student')->name('student.show');


//Admin Manage Po

Route::get('/admin/manage_portal','Portal@manage_portal')->name('admin.manage_portal');
Route::post('/admin/new_portal', 'Portal@add_portal')->name('admin.new_portal');
Route::get('/admin/portal/edit/{id}','Portal@portal_edit')->name('portal.edit');
Route::post('/admin/edit_new_portal','Portal@edit_new_portal')->name('admin.edit_new_portal');
Route::get('/admin/portal_status/{id}', 'Portal@portal_status');
Route::get('/admin/portal/delete/{id}','Portal@portal_delete')->name('portal.delete');

//User Portal
Route::get('/portal/user/signup','UserPortal@sign_up')->name('user.sign_up');
Route::get('/portal/user/signin','UserPortal@sign_in')->name('user.sign_in');
Route::post('/portal/new_user', 'UserPortal@new_user_portal')->name('portal.new_user');
Route::post('/portal/login', 'UserPortal@login_portal')->name('portal.new_user_login');


//portal operation

Route::get('/portal/dashboard','PortalOperation@dashboard')->name('portal.dashboard');
Route::get('/portal/exam_form/{id}','PortalOperation@exam_form')->name('portal.exam_form');
Route::post('/portal/form_submit','PortalOperation@form_submit')->name('portal.form_submit');
Route::get('/portal/exam_print/{id}','PortalOperation@print');
Route::get('/portal/update_form','PortalOperation@update_form')->name('portal.update_form');
Route::get('/portal/student_exam_info','PortalOperation@student_exam_info')->name('portal.student_exam_info');
Route::post('/portal/student_info_edit','PortalOperation@student_info_edit')->name('portal.student_info_edit');
Route::get('/portal/logout','PortalOperation@portal_logout')->name('portal.logout');

//Students

Route::get('/student/signup','StudentsController@signup')->name('student.signup');
Route::get('/student/signin','StudentsController@signin')->name('student.signin');
Route::post('/student/new_student', 'StudentsController@new_student')->name('student.new_student');
Route::post('/student/login', 'StudentsController@login_student')->name('student.new_student_login');
Route::get('/student/logout','StudentsController@student_logout')->name('student.logout');

Route::get('/student/dashboard','StudentsOperation@student_dashboard')->name('student.dashboard');
Route::get('/student/exam','StudentsOperation@exams')->name('student.exam');
Route::get('/student/join_exam/{id}','StudentsOperation@join_exam')->name('student.join_exam');
Route::post('/student/question_submit','StudentsOperation@question_submit')->name('question.submit');
Route::get('/student/show_result/{id}','StudentsOperation@show_result')->name('show_result');









