<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;

class BatchWiseStudentController extends Controller
{
    //batch_wise_student
    public function batch_wise_student()
    {
        $data = array();
        $data['active_menu'] = 'batch_wise_student';
        $data['page_title'] = 'batch_wise_student';
        $batch = Batch::all();
        $batch_id = request('batch_id', null);
        $batchName = User::where('batch_id', $batch_id)->select('batch_id')->first();
        $batchWiseStudent = User::where('batch_id', $batch_id)->get();
        $batchCount = User::where('batch_id', $batch_id)->count();
        return view('backend.batch.batch_wise_student', compact('batchName', 'data', 'batch', 'batch_id', 'batchWiseStudent', 'batchCount'));
    }
}
