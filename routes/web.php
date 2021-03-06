<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\coordinator;
use App\Http\Controllers\address;
use App\Mail\WelcomeMail;
use App\Mail\rejectMail;
use Illuminate\Support\Facades\Mail;


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
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('staff/home', [HomeController::class, 'staffHome'])->name('staff.home')->middleware('user_type');
Route::get('coordinator/home', [HomeController::class, 'coordinatorHome'])->name('coordinator.home')->middleware('user_type');
Route::get('applicant/home', [HomeController::class, 'applicantHome'])->name('applicant.home')->middleware('user_type');

Route::post('scholar/requirements', 'App\Http\Controllers\scholar@store')->middleware('user_type');
Route::get('scholar/success', 'App\Http\Controllers\scholar@index')->name('success')->middleware('user_type');
Route::get('scholar/withfiles', 'App\Http\Controllers\scholar@withfiles')->name('withfiles')->middleware('user_type');
Route::get('/coordinator/declined', 'App\Http\Controllers\coordinator@index')->name('coordinator.declined')->middleware('user_type');
Route::get('/coordinator/scholars', 'App\Http\Controllers\coordinator@scholars')->name('coordinator.scholars')->middleware('user_type');
Route::get('/coordinator/examiners', 'App\Http\Controllers\coordinator@examiners')->name('coordinator.examiners')->middleware('user_type');

Route::post('/coordinator/delete', 'App\Http\Controllers\coordinator@delete')->name('coordinator.delete')->middleware('user_type');
Route::post('/coordinator/deletes', 'App\Http\Controllers\coordinator@deletes')->name('coordinator.deletes')->middleware('user_type');
Route::get('/coordinator/accept/{id}', 'App\Http\Controllers\coordinator@accepted')->name('coordinator.accepted')->middleware('user_type');
Route::get('/coordinator/accepting/{id}', 'App\Http\Controllers\coordinator@accepting')->name('coordinator.accepting')->middleware('user_type');
Route::get('/coordinator/reject/{id}', 'App\Http\Controllers\coordinator@rejected')->name('coordinator.rejected')->middleware('user_type');
Route::get('/coordinator/exam/accept/{id}', 'App\Http\Controllers\coordinator@examaccepted')->name('exam.accepted')->middleware('user_type');
Route::get('/coordinator/exam/reject/{id}', 'App\Http\Controllers\coordinator@examrejected')->name('exam.rejected')->middleware('user_type');
Route::get('coordinator/applicant', 'App\Http\Controllers\coordinator@applicant')->middleware('user_type');

//register
Route::get('register/province', [address::class, 'province']);
Route::get('register/municipality', [address::class, 'municipality']);
Route::get('register/brgy', [address::class, 'brgy']);

Route::get('/email', function(){
    Mail::to('johncarlocasipit@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

//welcome
Route::get('exams/schedule', [coordinator::class, 'examdate']);

















