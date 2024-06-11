<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;
use PDOException;

class NoticeController extends Controller
{
    //noticeCreate
    public function noticeCreate()
    {
        $data = array();
        $data['active_menu'] = 'notice';
        $data['page_title'] = 'Notice Board';
        if (request()->isMethod('post')) {
            try{
                if(request()->hasFile('image')){
                    $extension = request()->file('image')->extension();
                    $photo_name= "backend/img/notice/".uniqid().'.'.$extension;
                    request()->file('image')->move('backend/img/notice', $photo_name);
                }else{
                    $photo_name = null;
                }
                Notice::create([
                    'title' => request('title'),
                    'image' => $photo_name,
                    'details' => request('details'),

               ]);
               return redirect()->back()->with('success', 'Event Created Successfully');
             }catch(PDOException $e){
                return $e;
             }
            }

        return view('backend.notice.notice_add',compact('data'));
    }
    //adminNoticeList
    public function adminNoticeList(){
        $data = array();
        $data['active_menu'] = 'notice';
        $data['page_title'] = 'Notice Board List';
        $notice = Notice::all();
        return view('backend.notice.notice_list',compact('data','notice'));

    }
    //noticeEdit
    public function noticeEdit($id)
    {
        $data = array();
        $data['active_menu'] = 'notice';
        $data['page_title'] = 'Notice Board';
        $notice = Notice::find($id);
        if (request()->isMethod('post')) {
            try{
                if(request()->hasFile('image')){
                    $extension = request()->file('image')->extension();
                    $photo_name= "backend/img/notice/".uniqid().'.'.$extension;
                    request()->file('image')->move('backend/img/notice', $photo_name);
                }else{
                    $photo_name = null;
                }
                $notice->update([
                    'title' => request('title'),
                    'image' => $photo_name,
                    'details' => request('details'),

               ]);
               return redirect()->back()->with('success', 'Event Created Successfully');
             }catch(PDOException $e){
                return $e;
             }
            }

        return view('backend.notice.notice_edit',compact('data','notice'));
    }
    //noticeDelete
    public function noticeDelete($id)
    {
        Notice::find($id)->delete();
        return redirect()->back()->with('success', 'Notice Deleted Successfully');
    }
}
