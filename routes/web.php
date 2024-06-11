<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CoursePayController;
use App\Http\Controllers\HighCourtController;
use App\Http\Controllers\LowerCourtController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\RealEventController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdvocateController;
use App\Http\Controllers\BatchWiseStudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/','dashboard');
//Route::match(['get','post'],'/register',[AdminAuthController::class,'register'])->name('register');
Route::match(['get','post'],'/login',[AdminAuthController::class,'login'])->name('login');
Route::match('get','/logout',[AdminAuthController::class,'logout'])->name('admin.logout');
Route::match(['get','post'],'/my-profile/{id}',[AdminAuthController::class,'myProfile'])->name('my.profile');
Route::match(['get','post'],'/change/password/{id}',[AdminAuthController::class,'changePassword'])->name('change.password');


Route::group(['middleware' => ['adminAuth']], function () {
    Route::match(['get'],'/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    //user

    Route::match(['get'],'/user_all',[UserController::class,'userAll'])->name('user_all');
    Route::match(['get'],'/user_all_high',[UserController::class,'user_all_high'])->name('user_all_high');
    Route::match(['get'],'/user_create',[UserController::class,'user_create'])->name('user_create');
    Route::match(['get'],'/user_approve',[UserController::class,'userApprove'])->name('user_approve');
    Route::match(['get','post'],'/user_delete/{id}',[UserController::class,'userDelete'])->name('user_delete');
    Route::match(['get','post'],'/user_approve_details/{id}',[UserController::class,'userApproveDetails'])->name('user_approve_details');
    // payment
    Route::match(['get','post'],'/user_payment/{id}',[UserController::class,'userPayment'])->name('user_payment');

    Route::match(['post'],'/user/disable/{id}',[UserController::class,'userDisable'])->name('user.disable');
    Route::match(['post'],'/user/enable/{id}',[UserController::class,'userEnable'])->name('user.enable');
    Route::match(['get','post'],'/user/edit/{id}',[UserController::class,'userEdit'])->name('user_edit');

    //event
    Route::match(['get','post'],'/eventCreate',[EventController::class,'eventCreate'])->name('eventCreate');
    Route::match(['get'],'/event',[EventController::class,'event'])->name('event');
    Route::match(['get'],'/event_user',[EventController::class,'event_user'])->name('event_user');
    Route::match(['get'],'/event_delete/{id}',[EventController::class,'event_delete'])->name('event_delete');
    Route::match(['get','post'],'/event_edit/{id}',[EventController::class,'eventEdit'])->name('event_edit');

    //Attendance

    Route::match(['get'],'attendance/form',[AttendanceController::class,'showForm'])->name('attendance.form');
    Route::post('/store.attendance',[AttendanceController::class,'storeAttendance'])->name('store.attendance');
    Route::get('attendance-list', [AttendanceController::class, 'attendanceList'])->name('attendance.list');
    Route::match(['get','post'],'qrocde', [AttendanceController::class, 'qrocde'])->name('qrocde');

    //attendance_print
    Route::get('attendance_print/{id}', [AttendanceController::class, 'attendancePrint'])->name('attendance_print');
    Route::get('absent/list', [AttendanceController::class, 'absentList'])->name('absent.list');

    // Course Pay
    Route::match(['get','post'],'/course/pay',[CoursePayController::class,'coursePay'])->name('course.pay');
    Route::match(['get'],'/course/list',[CoursePayController::class,'courseList'])->name('course.list');
    Route::match(['get'],'/course_print/{id}',[CoursePayController::class,'course_print'])->name('course_print');
    Route::match(['get'],'/coursePdf/{id}',[CoursePayController::class,'coursePdf'])->name('coursePdf');
    Route::match(['get','post'],'/course_edit/{id}',[CoursePayController::class,'course_edit'])->name('course_edit');
    Route::match(['get','post'],'/coursePay_delete/{id}',[CoursePayController::class,'coursePay_delete'])->name('coursePay_delete');


    //user create lower court
    Route::match(['get','post'],'/userCreate',[UserController::class,'userCreate'])->name('userCreate');
    //written lower
    Route::match(['get','post'],'/userWritten',[UserController::class,'userWritten'])->name('userWritten');
    //viva lower
    Route::match(['get','post'],'/userViva',[UserController::class,'userViva'])->name('userViva');
    //userHighViva
    Route::match(['get','post'],'/userHighViva',[UserController::class,'userHighViva'])->name('userHighViva');
    //userHighWritten
    Route::match(['get','post'],'/userHighWritten',[UserController::class,'userHighWritten'])->name('userHighWritten');
     //user create higher court
     Route::match(['get','post'],'/userHighCreate',[UserController::class,'userHighCreate'])->name('userHighCreate');
     Route::match(['get','post'],'/lowerCourt',[LowerCourtController::class,'lowerCourt'])->name('lowerCourt');
    //print
    Route::match(['get'],'/user/high/print/{id}',[UserController::class,'userHighPrint'])->name('user_high_print');
    Route::match(['get'],'/user/lower/print/{id}',[UserController::class,'userLowerPrint'])->name('user_lower_print');
     //highCourt
     Route::match(['get','post'],'/highCourt',[HighCourtController::class,'highCourt'])->name('highCourt');
     //event
     Route::match(['get','post'],'/realEventCreate',[RealEventController::class,'realEventCreate'])->name('realEventCreate');
     Route::match(['get','post'],'/RealEvent',[RealEventController::class,'RealEvent'])->name('RealEvent');
     Route::match(['get','post'],'/relevent_edit/{id}',[RealEventController::class,'releventEdit'])->name('relevent_edit');
     Route::match(['get'],'/realEvent_delete/{id}',[RealEventController::class,'realEventDelete'])->name('realEvent_delete');
     Route::match(['post'],'/disableStatus/{id}',[RealEventController::class,'disableStatus'])->name('disableStatus');
     Route::match(['post'],'/enableStatus/{id}',[RealEventController::class,'enableStatus'])->name('enableStatus');
    //batchCreate
    Route::match(['get','post'],'/batch/create',[BatchController::class,'batchCreate'])->name('batch.create');
    Route::match(['get','post'],'/batch/list',[BatchController::class,'batchList'])->name('batch.list');
    Route::match(['get','post'],'/batch/edit/{id}',[BatchController::class,'batchEdit'])->name('batch_edit');
    Route::match(['get','post'],'/batch/delete/{id}',[BatchController::class,'batchDelete'])->name('batchDelete');

    //batch_wise_student
    Route::get('/batch_wise_student',[BatchWiseStudentController::class,'batch_wise_student'])->name('batch_wise_student');
    // Route::post('/batch_wise_student',[BatchWiseStudentController::class,'batch_wise_student_post'])->name('batch_wise_student_post');


    //list panel
    //contactList
    Route::match(['get','post'],'/contactList',[ContactController::class,'contactList'])->name('contactList');
    Route::match(['get','post'],'/contactListDelete/{id}',[ContactController::class,'contactListDelete'])->name('contactListDelete');
    //reviewList
    Route::match(['get','post'],'/reviewList',[ReviewController::class,'reviewList'])->name('reviewList');
    Route::match(['get','post'],'/reviewListDeleted/{id}',[ReviewController::class,'reviewListDeleted'])->name('reviewListDeleted');
    //admin.ourTeamCreate
    Route::match(['get','post'],'/ourTeamCreate',[OurTeamController::class,'ourTeamCreate'])->name('admin.ourTeamCreate');
    Route::match(['get','post'],'/ourTeamList',[OurTeamController::class,'ourTeamList'])->name('admin.ourTeamList');
    //ourTeam Edit
    Route::match(['get','post'],'/ourTeamEdit/{id}',[OurTeamController::class,'ourTeamEdit'])->name('admin.ourTeamEdit');
    Route::match(['get','post'],'/ourTeamDelete/{id}',[OurTeamController::class,'ourTeamDelete'])->name('admin.ourTeamDelete');
    //notice.create
    Route::match(['get','post'],'/noticeCreate',[NoticeController::class,'noticeCreate'])->name('notice.create');
    Route::match(['get','post'],'/admin/noticeList',[NoticeController::class,'adminNoticeList'])->name('admin.noticeList');
    Route::match(['get','post'],'/noticeEdit/{id}',[NoticeController::class,'noticeEdit'])->name('noticeEdit');
    Route::match(['get','post'],'/noticeDelete/{id}',[NoticeController::class,'noticeDelete'])->name('noticeDelete');
    //Advocate Panel
    Route::match(['get','post'],'/advocate/create',[AdvocateController::class,'advocateCreate'])->name('advocate.create');
    Route::match(['get'],'/advocate/list',[AdvocateController::class,'advocateList'])->name('advocate.list');
    Route::match(['get','post'],'/advocate/edit/{id}',[AdvocateController::class,'advocateEdit'])->name('advocate.edit');
    Route::match(['get'],'/advocate/delete/{id}',[AdvocateController::class,'advocateDelete'])->name('advocate.delete');
    //ajax default controller
    Route::post('user-get', [DefaultController::class, 'userGet'])->name('user-get');
    Route::post('/get-user', [DefaultController::class, 'getUserData']);
    Route::get('/getCost', [DefaultController::class, 'getCost']);
    Route::post('/getlowerCource', [DefaultController::class, 'getlowerCource']);
    Route::post('/getHighCource', [DefaultController::class, 'getHighCource']);
    Route::post('/getCourses', [DefaultController::class, 'getCourses']);
    Route::post('/geTableData', [DefaultController::class, 'geTableData']);

    //student Report
    Route::match(['get','post'],'/student/report',[ReportController::class,'studentReport'])->name('student.report');
        //student Report
    Route::match(['get','post'],'/student/dueReport',[ReportController::class,'studentDeuReport'])->name('student.deuReport');
});
