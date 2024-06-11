<?php

namespace App\Http\Controllers;

use App\Models\HighCourt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HighCourtController extends Controller
{
    //highCourt
    public function highCourt(){
        $data = array();
        $data['active_menu'] = 'lower';
        $data['page_title'] = 'High Court';
        $data['high'] = $high = DB::table('high_courts')->get();
        if(request()->isMethod('post'))
        {
            HighCourt::create([
                'court_name' => request('court_name')
            ]);
        }

        return view('backend.lower.highCreate',compact('data'));
    }
}
