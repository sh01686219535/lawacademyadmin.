<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\CoursePay;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    //studentReport
    public function studentReport()
    {
        $data = array();
        $data['active_menu'] = 'report';
        $data['page_title'] = 'Report List';

        $batch = Batch::all();
        $fromDate = request('from_date');
        $endDate = request('end_date');
        $batch_id = request('batch_id');

        $users = User::where('batch_id', $batch_id)
            ->whereDate('created_at', '>=', date('Y-m-d', strtotime(request('start_date') ?? date('Y-m-d'))))
            ->whereDate('created_at', '<=', date('Y-m-d', strtotime(request('end_date') ?? date('Y-m-d'))))
            ->get();
     

        if (request('generate_pdf') == '1') {
            $pdf = PDF::loadView('report_pdf', compact('data', 'batch', 'coursePayResults'));
            return $pdf->stream('report_pdf.pdf');
        } else {
            return view('backend.report.studentReport', compact('data', 'batch', 'users'));
        }
    }
    public function studentDeuReport()
    {
        $data = array();
        $data['active_menu'] = 'report';
        $data['page_title'] = 'Report List';

        $batch = Batch::all();

        $coursePay = CoursePay::with('batch', 'user', 'course');

        if (request()->has('batch_id') && request()->has('from_date') && request()->has('to_date')) {
            $fromDate = request('from_date');
            $toDate = request('to_date');

            try {
                $fromDate = Carbon::parse($fromDate)->format('Y-m-d');
                $toDate = Carbon::parse($toDate)->format('Y-m-d');
            } catch (\Exception $e) {
                return $e;
            }

            $coursePay->whereBetween('created_at', [$fromDate, $toDate]);

            if (request()->has('batch_id')) {
                $coursePay->where('batch_id', request('batch_id'));
            }
        }
        $coursePay->where('due_amount', '>', 0);
        $coursePayResults = $coursePay->get();
        if (request('generate_pdf') == '1') {
            $pdf = PDF::loadView('due_pdf', compact('data', 'batch', 'coursePayResults', 'fromDate', 'toDate'));
            return $pdf->stream('dueAll.pdf');
        } else {
            return view('backend.report.studentDueReport', compact('data', 'batch', 'coursePayResults'));
        }
    }
}
