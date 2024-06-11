<?php

namespace App\Http\Controllers;

use App\Models\LowerCourt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LowerCourtController extends Controller
{
    public function lowerCourt(){
        $data = array();
        $data['active_menu'] = 'lower';
        $data['page_title'] = 'Lower Court';
        $data['lower'] = $lower = DB::table('lower_courts')->get();
        if(request()->isMethod('post'))
        {
            LowerCourt::create([
                'court_name' => request('court_name')
            ]);
        }

        return view('backend.lower.lowerCreate',compact('data'));
    }
    // public function lowerCourtList()
    // {
    //     $data = array();
    //     $data['active_menu'] = 'lower';
    //     $data['page_title'] = 'Lower Court';
    //     return view('backend.lower.lowerCreate',compact('data'));
    // }
}
