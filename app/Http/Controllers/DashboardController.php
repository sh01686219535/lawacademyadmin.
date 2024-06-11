<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\CoursePay;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = array();
        $data['active_menu'] = 'dashboard';
        $data['page_title'] = 'Dashboard';
        //total Paid amount
        $coursePaySum = CoursePay::sum('paid_amount');
        //Monthly Payable amount
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $monthlyPayable = CoursePay::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('cost');
        //Monthly Paid amount
        $monthlyIncome = CoursePay::whereMonth('month', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('paid_amount');
        //Monthly Due amount
        $monthlyUnPaid = $balance = $monthlyPayable-$monthlyIncome;
        //Total student
        $totalStudent = User::where('status','approved')->count();
    
        $coursePay = CoursePay::with('batch')
        ->select('batch_id', \DB::raw('count(*) as count'))
        ->groupBy('batch_id')
        ->get();

        return view('backend.dashboard.dashboard', compact('data', 'coursePaySum', 'monthlyIncome', 'totalStudent', 'monthlyUnPaid', 'monthlyPayable', 'coursePay'));
    }
}
