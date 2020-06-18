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
    return view('welcome');
})->middleware('guest');;

Auth::routes();

// Route::get('/admin', 'AdminHomeController@index')->middleware('isadmin');
// Route::get('/candidate', 'CandidateHomeController@index')->middleware('auth');

Route::group(['middleware' => ['isadmin']], function () {
    Route::get('/admin', 'Admin\AdminHomeController@index');
    Route::resource('/admin/user', 'Admin\UserController');
    Route::get('/admin/showusers', 'Admin\UserController@showUsers');
    Route::get('/admin/deleteuser/{id}', 'Admin\UserController@destroy');

    Route::resource('/admin/category', 'Admin\CategoryController');
    Route::get('/admin/showcategory', 'Admin\CategoryController@showCategory');
    Route::get('/admin/adduserstocategory', 'Admin\CategoryController@adduserstocategory');

    Route::resource('/admin/exam', 'Admin\ExamController');
    Route::get('/admin/showexams', 'Admin\ExamController@showexams');
    Route::get('/admin/edit_exam', 'Admin\ExamController@editExam');
    Route::get('/admin/finished_exams', 'Admin\ExamController@finishedExams');
    Route::get('/admin/finished_exam', 'Admin\ExamController@finishedExam');
    Route::get('/admin/candidate_result', 'Admin\ExamController@candidateResult');
    Route::resource('/admin/pdf_exam_report', 'Admin\PDFGenerateController');
});

Route::group(['middleware' => ['iscandidate']], function () {
    Route::get('/candidate', 'Candidate\CandidateHomeController@index');
    Route::get('/candidate/showexams', 'Candidate\CandidateExamController@index');
    Route::get('/candidate/takeexam', 'Candidate\CandidateExamController@takeExam');
    Route::post('/candidate/submit_exam', 'Candidate\CandidateExamController@submitExam');
    Route::get('/candidate/attended_exams', 'Candidate\PostExamController@attendedExams');
    Route::get('/candidate/view_result', 'Candidate\PostExamController@viewResult');

});


