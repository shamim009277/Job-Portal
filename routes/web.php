<?php

use Illuminate\Support\Facades\Route;

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
//-------------------Frontend(Candidate)----------------

Route::get('/','FrontendController@index')->name('');
Route::get('/can_signin','FrontendController@candidateSignin')->name('CandidateSignin');
Route::resource('/candidate','CandidateController');
Route::resource('/edit_resume','CandidatePersonalInfoController');
Route::resource('/address','CandidateAddressController');
Route::resource('/career','CandidateCareerInfoController');
Route::resource('/area','CandidatePreferredAreaController');
Route::post('/experience/editHistory','CandidateEmploymentHistoryController@editHistory');
Route::get('/experience/delete/{id}','CandidateEmploymentHistoryController@delete');
Route::resource('/experience','CandidateEmploymentHistoryController');


Route::post('/traing/editTrain','CandidateTrainingController@editTrain');
Route::get('/traing/delete/{id}','CandidateTrainingController@delete');
Route::resource('/traing','CandidateTrainingController');
Route::post('/candidate_signin','FrontendController@candidateSign');
Route::get('/job','FrontendController@jobsearch')->name('jobsearch');
Route::get('/candidate_dashboard/view_resume','FrontendController@view_resume');
Route::get('/candidate_dashboard','FrontendController@jobWelcome')->name('welcome');
Route::get('/candidate_logout','FrontendController@candidate_logout')->name('CandidateLogout');
Route::get('/jobdetails/{id}','FrontendController@jobdetails')->name('jobdetails');
//Route::get('/job_post','FrontendController@jobPost')->name('jobpost');

//-------------------Frontend(Employers)--------------------

Route::get('/employeer_sign','EmployeerController@index')->name('EmployeerSignin');
Route::get('/emp_logout','EmployeerController@emp_logout')->name('EmployeerSignOut');
Route::get('/employeer/job_posts/{id}','EmployeerController@employer_post_job');
Route::get('/EmployerDashboard','EmployeerController@employer_dashboard')->name('EmployeerDashboard');
Route::post('/employer_signin','EmployeerController@employerLogin')->name('EmployeerLogin');
Route::resource('/employeer','EmployeerCreateController');
Route::resource('/post_job','JobpostController');

Auth::routes();

//-----------------Backend-------------------
Route::group(['middleware'=>['auth']],function(){
	Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::resource('category', 'Admin\JobCategoryController');
    Route::resource('job_seaker', 'Admin\JobSeakerController');
    Route::resource('job_post', 'Admin\JobPostController');
    Route::resource('blog', 'Admin\BlogController');
});












