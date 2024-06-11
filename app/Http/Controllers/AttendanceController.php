<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Batch;
use App\Models\BatchAttendance;
use App\Models\CoursePay;
use App\Models\Event;
use App\Models\Qrcode;
use App\Models\User;
use App\Models\UserEvent;
use Carbon\Carbon;
use Exception;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

use PDOException;

class AttendanceController extends Controller
{
    public function showForm(Request $request)
    {
        $event = Event::all();
        $data = array();
        $data['active_menu'] = 'attendance';
        $data['page_title'] = 'attendance Form';
        if(request()->isMethod('post')){
            try{
              return redirect()->back()->with('success', 'Event Created Successfully');
            }catch(Exception $e){
               return  $e;
            }
           }
           $randomString = Str::random(10);
        $qrCodeData = "Random QR code data: $randomString\n";
        return view('backend.attendance.attendance_add',compact('data','event'));
    }

    //attendanceList
    public function attendanceList(){

        $batch = Batch::all();
        $event = Event::select('title')->get();
        $data = array();
        $data['active_menu'] = 'attendance';
        $data['page_title'] = 'attendance List';
        $attendances = Attendance::select('serial_id','status','batch_id')->get();
        $attendanceBatch = BatchAttendance::select('batch_id','student_id')->get();

        $batchAttendance = BatchAttendance::with('batch', 'users');

        $getAttendance = $batchAttendance->where('batch_id', request('batch_id'))->get();
        $date = request('from_date');
        $fromDate = Carbon::parse($date)->format('Y-m-d');
        $batch_id=request('batch_id');

        if (request('generate_pdf') == '1') {
            $pdf = PDF::loadView('attendance_pdf', compact('data','event','attendanceBatch','batch','batch_id','getAttendance','fromDate'));
            return $pdf->stream('attendance_list.pdf');
        } else {
            return view('backend.attendance.attendance_list',compact('data','event','attendanceBatch','batch','batch_id','getAttendance','fromDate'));
        }
    }
    //presentUser
    public function attendancePrint($id){
        $attendance = Attendance::find($id);
        return view('backend.attendance.attendance_details',compact('attendance'));
    }

    public function absentList(Request $request)
    {
        $batch = Batch::all();
        $event = Event::select('title')->get();
        $data = array();
        $data['active_menu'] = 'attendance';
        $data['page_title'] = 'attendance List';

        $batchAttendance = BatchAttendance::with('batch', 'users');
        $batch_id = request('batch_id', null);

     $getAttendance = $batchAttendance->where('batch_id', request('batch_id'))->get();
        $date1 = request('from_date');
        $date2 = request('to_date');

        $fromDate = Carbon::parse($date1)->format('Y-m-d');
         $toDate = Carbon::parse($date2)->format('Y-m-d');
        $batch_id=request('batch_id');
        if (request('generate_pdf') == '1') {
            $pdf = PDF::loadView('absent_pdf', compact('data', 'event', 'batch', 'batch_id', 'getAttendance', 'fromDate', 'toDate'));
            return $pdf->stream('absent_list.pdf');
        } else {
            return view('backend.attendance.absent_list', compact('data', 'event', 'batch', 'batch_id', 'getAttendance', 'fromDate', 'toDate'));
        }
    }
   //qrocde
   public function qrocde(Request $request){
       $data = array();
       $data['active_menu'] = 'qrcode_list';
       $data['page_title'] = 'Qrcode List';
       if (request()->isMethod('post')) {
        try{
            $randomString = Str::random(10);
            // $randomString = $request->qrcode;
            $qrCodeData = "https://ferozlawacademy.com/attendance";
            $qrCodeDirectory = public_path('qrcodes');
            if (!file_exists($qrCodeDirectory)) {
                mkdir($qrCodeDirectory, 0755, true);
            }
            $qrCodeImage = QrCodeGenerator::size(800)->generate($qrCodeData);
            $uniqueFilename = uniqid('qr_code_');
            $qrCodeImagePath = public_path('qrcodes/' . $uniqueFilename . '.png');
            file_put_contents($qrCodeImagePath, $qrCodeImage);

              $Qrcode = new Qrcode();
              $Qrcode->qrcode = $qrCodeData;
              $Qrcode->save();
              return back()->with('success', 'qrcode Created Successfully');
            }catch(PDOException $e){
               return $e;
            }
           }
           $qrcode = Qrcode::all();
       return view('backend.attendance.qrcode_list',compact('data','qrcode'));
   }
}
