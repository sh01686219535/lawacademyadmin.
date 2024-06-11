<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/LowerCourtRegister',[ApiController::class,'LowerCourtRegister'])->name('LowerCourtRegister');
Route::post('/highCourtRegister',[ApiController::class,'highCourtRegister'])->name('highCourtRegister');
Route::get('/courseAll',[ApiController::class,'courseAll'])->name('courseAll');

Route::post('/eventRegister',[ApiController::class,'eventRegister'])->name('eventRegister');
Route::post('/userLogin',[ApiController::class,'userLogin'])->name('userLogin');
Route::get('/eventData',[ApiController::class,'eventData'])->name('eventData');
//contact
Route::post('/contact',[ApiController::class,'contact'])->name('contact');
//email verification
Route::match('get','/verify/{email}/{code}',[ApiController::class,'verify'])->name('user.verify');
Route::get('/event-user-counts',[ApiController::class,'event_user_counts']);
Route::get('/userData',[ApiController::class,'userData'])->name('userData');
Route::group(['middleware' => ['jwtAuth']], function () {
    Route::get('profileProgress',[ApiController::class,'profileProgress']);
    Route::post('/review',[ApiController::class,'review'])->name('review');
    Route::get('/studentWiseData',[ApiController::class,'studentWiseData'])->name('studentWiseData');
    Route::get('/studentPayInfo',[ApiController::class,'studentPayInfo'])->name('studentPayInfo');
    Route::post('/attendance',[ApiController::class,'attendance'])->name('attendance');
});
Route::get('/studentAll',[ApiController::class,'studentAll'])->name('studentAll');
Route::get('/advocateList',[ApiController::class,'advocateList'])->name('advocateList');
Route::get('/OurTeamList',[ApiController::class,'OurTeamList'])->name('OurTeamList');
Route::get('/noticeList',[ApiController::class,'noticeList'])->name('noticeList');

Route::get('/batch',[ApiController::class,'batch'])->name('batch');
Route::get('/reviewGet',[ApiController::class,'reviewGet'])->name('reviewGet');
Route::get('/coursePay',[ApiController::class,'coursePay'])->name('coursePay');





