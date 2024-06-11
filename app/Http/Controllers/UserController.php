<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\BatchAttendance;
use App\Models\CoursePay;
use App\Models\Event;
use App\Models\HighCourt;
use App\Models\LowerCourt;
use App\Models\StudentCost;
use App\Models\User;
use App\Models\UserHigh;
use Illuminate\Http\Request;
use PDF;
use PDOException;

class UserController extends Controller
{
    //user userAll
    public function userAll()
    {
        $data = array();
        $data['active_menu'] = 'user';
        $data['page_title'] = 'User List';
        $user = User::where('lower_court')->orderBy('id', 'desc')->get();
        return view('backend.user.user_list', compact('data', 'user'));
    }
    //userEdit
    public function userDelete($id)
    {
        User::find($id)->delete();
        return back()->with('message', 'User Deleted Successfully !!!');
    }
    //userApprove
    public function userApprove()
    {
        $data = array();
        $data['active_menu'] = 'user';
        $data['page_title'] = 'User Approve List';
        $user = User::where('status', 'pending')->orderBy('id', 'desc')->get();
        return view('backend.user.user_approve_list', compact('data', 'user'));
    }
    //userApproveDetails
    public function userApproveDetails($id)
    {
        $user = User::find($id);
        $user->status = 'approved';
        $user->save();
        if ($user->lower_court == '1') {
            return redirect('/user_all_high')->with('message', 'User Approved Successfully');
        } elseif ($user->high_court == '1') {
            return redirect('/user_all')->with('message', 'User Approved Successfully');
        }
    }
    public function user_create()
    {
        $data = array();
        $data['active_menu'] = 'user';
        $data['page_title'] = 'User Create';
        return view('backend.user.userCreate', compact('data'))->with('message', 'User Approved Successfully');
    }

    //userDisable
    public function userDisable(Request $request, $id)
    {
        $user = User::find($id);
        $user->user_status = 'userEnable';
        $user->save();
        return redirect()->back()->with('success', 'Users Updated Successfully');
    }
    //userEnable
    public function userEnable(Request $request, $id)
    {
        $user = User::find($id);
        $user->user_status = 'userDisable';
        $user->save();
        return redirect()->back()->with('success', 'Users Updated Successfully');
    }
    //userEdit
    public function userEdit($id)
    {
        $data = array();
        $data['active_menu'] = 'user';
        $data['page_title'] = 'Event Edit';
        $user = User::find($id);
        if (request()->isMethod('post')) {
            try {
                if (request()->hasFile('image')) {
                    $extension = request()->file('image')->extension();
                    $photo_name = 'backend/img/user/' . uniqid() . '.' . $extension;
                    request()->file('image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }
                $user->update([
                    'name' => request('name'),
                    'lower_court' => request('lower_court'),
                    'email' => request('email'),
                    'image' => $photo_name,
                    'address' => request('address'),
                    'fathers_name' => request('fathers_name'),
                    'mothers_name' => request('mothers_name'),
                    'referred_by' => request('referred_by'),
                    'gpa' => request('gpa'),
                    'gpa_llm' => request('gpa_llm'),
                    'court_practice' => request('court_practice'),
                    'gender' => request('gender'),
                    'emergency_phone' => request('emergency_phone'),
                    'relation' => request('relation'),
                    'qualified_year' => request('qualified_year'),
                    'qualified_year_llm' => request('qualified_year_llm'),
                    'phone' => request('phone'),
                    'birth_date' => request('birth_date'),
                    'qualification' => request('qualification'),

                    'university' => request('university'),
                    'university_llm' => request('university_llm'),
                    'password' => bcrypt(request('password')),
                    'confirm_password' => bcrypt(request('confirm_password')),
                ]);
                return to_route('user_all')->with('success', 'User Updated Successfully');
            } catch (PDOException $e) {
                return redirect()->back()->with('error', 'Failed Please Try Again');
            }
        }
        return view('backend.user.userEdit', compact('user', 'data'));
    }
    //mcq lower
    public function userCreate(Request $request)
    {

        $data = array();
        $data['active_menu'] = 'userall';
        $data['page_title'] = 'Create User';
        if (request()->isMethod('post')) {
            try {
                if (request()->hasFile('image')) {
                    $extension = request()->file('image')->extension();
                    $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
                    request()->file('image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }

                User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'lower_court' => request('lower_court'),
                    'image' => $photo_name,
                    'address' => request('address'),
                    'referred_by' => request('referred_by'),
                    'fathers_name' => request('fathers_name'),
                    'mothers_name' => request('mothers_name'),
                    'gpa' => request('gpa'),
                    'gpa_llm' => request('gpa_llm'),
                    'court_practice' => request('court_practice'),
                    'gender' => request('gender'),
                    'emergency_phone' => request('emergency_phone'),
                    'relation' => request('relation'),
                    'qualified_year' => request('qualified_year'),
                    'qualified_year_llm' => request('qualified_year_llm'),
                    'phone' => request('phone'),
                    'birth_date' => request('birth_date'),
                    'qualification' => request('qualification'),
                    'university' => request('university'),
                    'university_llm' => request('university_llm'),
                    'password' => bcrypt(request('password')),
                    'confirm_password' => bcrypt(request('confirm_password')),
                    'course_id' => request('course_id'),
                    'batch_id' => request('batch_id'),
                    'admission_date' => request('admission_date'),

                ]);
                return redirect('/user_approve')->with('success', 'Event Created Successfully');
            } catch (PDOException $e) {
                return $e;
            }
        }
        $lowerCourt = LowerCourt::all();
        $batch = Batch::all();
        $course = Event::where('lowerCourt_id', '1')->where('title', 'MCQ')->get();

        $user_serial = User::whereNotNull('serial_number') // Ensure 'serial_number' is not null
            ->orderBy('id', 'desc')
            ->select('id', 'serial_number') // Select both 'id' and 'serial_number'
            ->first(); // Get the last record based on id

        if ($user_serial) {
            $lastSerialNumber = $user_serial->serial_number + 1;
        } else {
            $lastSerialNumber = 5001;
        }
        // return view('backend.user.createUser',compact('data','lowerCourt',['nextSerialNumber' => $nextSerialNumber]));
        return view('backend.user.createUser', compact('data', 'lowerCourt', 'batch', 'course', 'lastSerialNumber'));
    }
    //written lower
    public function userWritten(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'userall';
        $data['page_title'] = 'Create User';

        if (request()->isMethod('post')) {
            try {
                if (request()->hasFile('image')) {
                    $extension = request()->file('image')->extension();
                    $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
                    request()->file('image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }

                User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'lower_court' => request('lower_court'),
                    'image' => $photo_name,
                    'address' => request('address'),
                    'fathers_name' => request('fathers_name'),
                    'mothers_name' => request('mothers_name'),
                    'gpa' => request('gpa'),
                    'referred_by' => request('referred_by'),
                    'gpa_llm' => request('gpa_llm'),
                    'court_practice' => request('court_practice'),
                    'gender' => request('gender'),
                    'emergency_phone' => request('emergency_phone'),
                    'relation' => request('relation'),
                    'qualified_year' => request('qualified_year'),
                    'qualified_year_llm' => request('qualified_year_llm'),
                    'phone' => request('phone'),
                    'birth_date' => request('birth_date'),
                    'qualification' => request('qualification'),
                    'university' => request('university'),
                    'university_llm' => request('university_llm'),
                    'password' => bcrypt(request('password')),
                    'confirm_password' => bcrypt(request('confirm_password')),
                    'course_id' => request('course_id'),
                    'batch_id' => request('batch_id'),
                    'admission_date' => request('admission_date'),
                ]);
                return redirect('/user_approve')->with('success', 'Event Created Successfully');
            } catch (PDOException $e) {
                return $e;
            }
        }
        $lowerCourt = LowerCourt::all();
        $batch = Batch::all();
        $course = Event::where('lowerCourt_id', '1')->where('title', 'Written')->get();

        $user_serial = User::whereNotNull('serial_number') // Ensure 'serial_number' is not null
            ->orderBy('id', 'desc')
            ->select('id', 'serial_number') // Select both 'id' and 'serial_number'
            ->first(); // Get the last record based on id

        if ($user_serial) {
            $lastSerialNumber = $user_serial->serial_number + 1;
        } else {
            $lastSerialNumber = 5001;
        }
        // return view('backend.user.createUser',compact('data','lowerCourt',['nextSerialNumber' => $nextSerialNumber]));
        return view('backend.user.createWritten', compact('data', 'lowerCourt', 'batch', 'course', 'lastSerialNumber'));
    }
    //userViva lower
    public function userViva(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'userall';
        $data['page_title'] = 'Create User';

        if (request()->isMethod('post')) {
            try {
                if (request()->hasFile('image')) {
                    $extension = request()->file('image')->extension();
                    $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
                    request()->file('image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }

                User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'lower_court' => request('lower_court'),
                    'image' => $photo_name,
                    'address' => request('address'),
                    'fathers_name' => request('fathers_name'),
                    'referred_by' => request('referred_by'),
                    'mothers_name' => request('mothers_name'),
                    'gpa' => request('gpa'),
                    'gpa_llm' => request('gpa_llm'),
                    'court_practice' => request('court_practice'),
                    'gender' => request('gender'),
                    'emergency_phone' => request('emergency_phone'),
                    'relation' => request('relation'),
                    'qualified_year' => request('qualified_year'),
                    'qualified_year_llm' => request('qualified_year_llm'),
                    'phone' => request('phone'),
                    'birth_date' => request('birth_date'),
                    'qualification' => request('qualification'),

                    'university' => request('university'),
                    'university_llm' => request('university_llm'),
                    'password' => bcrypt(request('password')),
                    'confirm_password' => bcrypt(request('confirm_password')),
                    'course_id' => request('course_id'),
                    'batch_id' => request('batch_id'),
                    'admission_date' => request('admission_date'),
                ]);
                return redirect('/user_approve')->with('success', 'Student Created Successfully');
            } catch (PDOException $e) {
                return $e;
            }
        }
        $lowerCourt = LowerCourt::all();
        $batch = Batch::all();
        $course = Event::where('lowerCourt_id', '1')->where('title', 'Viva')->get();

        $user_serial = User::whereNotNull('serial_number') // Ensure 'serial_number' is not null
            ->orderBy('id', 'desc')
            ->select('id', 'serial_number') // Select both 'id' and 'serial_number'
            ->first(); // Get the last record based on id

        if ($user_serial) {
            $lastSerialNumber = $user_serial->serial_number + 1;
        } else {
            $lastSerialNumber = 5001;
        }
        // return view('backend.user.createUser',compact('data','lowerCourt',['nextSerialNumber' => $nextSerialNumber]));
        return view('backend.user.userViva', compact('data', 'lowerCourt', 'batch', 'course', 'lastSerialNumber'));
    }
    //user High Written
    public function userHighWritten(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'userall';
        $data['page_title'] = 'Create User';

        if (request()->isMethod('post')) {
            try {
                if (request()->hasFile('image')) {
                    $extension = request()->file('image')->extension();
                    $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
                    request()->file('image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }

                User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'high_court' => request('high_court'),
                    'image' => $photo_name,
                    'address' => request('address'),
                    'fathers_name' => request('fathers_name'),
                    'mothers_name' => request('mothers_name'),
                    'gpa' => request('gpa'),
                    'referred_by' => request('referred_by'),
                    'gpa_llm' => request('gpa_llm'),
                    'court_practice' => request('court_practice'),
                    'gender' => request('gender'),
                    'emergency_phone' => request('emergency_phone'),
                    'relation' => request('relation'),
                    'qualified_year' => request('qualified_year'),
                    'qualified_year_llm' => request('qualified_year_llm'),
                    'phone' => request('phone'),
                    'birth_date' => request('birth_date'),
                    'qualification' => request('qualification'),
                    'university' => request('university'),
                    'university_llm' => request('university_llm'),
                    'password' => bcrypt(request('password')),
                    'confirm_password' => bcrypt(request('confirm_password')),
                    'course_id' => request('course_id'),
                    'batch_id' => request('batch_id'),
                    'admission_date' => request('admission_date'),
                ]);
                return redirect('/user_approve')->with('success', 'Student Created Successfully');
            } catch (PDOException $e) {
                return $e;
            }
        }
        $highCourt = HighCourt::all();
        $batch = Batch::all();
        $course = Event::where('highCourt_id', '1')->where('title', 'HCD Permission Written Batch')->get();

        $user_serial = User::whereNotNull('serial_number') // Ensure 'serial_number' is not null
            ->orderBy('id', 'desc')
            ->select('id', 'serial_number') // Select both 'id' and 'serial_number'
            ->first(); // Get the last record based on id

        if ($user_serial) {
            $lastSerialNumber = $user_serial->serial_number + 1;
        } else {
            $lastSerialNumber = 5001;
        }
        // return view('backend.user.createUser',compact('data','lowerCourt',['nextSerialNumber' => $nextSerialNumber]));
        return view('backend.user.highUserWritten', compact('data', 'highCourt', 'batch', 'course', 'lastSerialNumber'));
    }
    //userHighViva
    public function userHighViva(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'userall';
        $data['page_title'] = 'Create User';

        if (request()->isMethod('post')) {
            try {
                if (request()->hasFile('image')) {
                    $extension = request()->file('image')->extension();
                    $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
                    request()->file('image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }

                User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'high_court' => request('high_court'),
                    'image' => $photo_name,
                    'address' => request('address'),
                    'fathers_name' => request('fathers_name'),
                    'mothers_name' => request('mothers_name'),
                    'gpa' => request('gpa'),
                    'referred_by' => request('referred_by'),
                    'gpa_llm' => request('gpa_llm'),
                    'court_practice' => request('court_practice'),
                    'gender' => request('gender'),
                    'emergency_phone' => request('emergency_phone'),
                    'relation' => request('relation'),
                    'qualified_year' => request('qualified_year'),
                    'qualified_year_llm' => request('qualified_year_llm'),
                    'phone' => request('phone'),
                    'birth_date' => request('birth_date'),
                    'qualification' => request('qualification'),
                    'university' => request('university'),
                    'university_llm' => request('university_llm'),
                    'password' => bcrypt(request('password')),
                    'confirm_password' => bcrypt(request('confirm_password')),
                    'course_id' => request('course_id'),
                    'batch_id' => request('batch_id'),
                    'admission_date' => request('admission_date'),
                ]);
                return redirect('/user_approve')->with('success', 'Student Created Successfully');
            } catch (PDOException $e) {
                return $e;
            }
        }
        $highCourt = HighCourt::all();
        $batch = Batch::all();
        $course = Event::where('highCourt_id', '1')->where('title', 'Viva')->get();

        $user_serial = User::whereNotNull('serial_number') // Ensure 'serial_number' is not null
            ->orderBy('id', 'desc')
            ->select('id', 'serial_number') // Select both 'id' and 'serial_number'
            ->first(); // Get the last record based on id

        if ($user_serial) {
            $lastSerialNumber = $user_serial->serial_number + 1;
        } else {
            $lastSerialNumber = 5001;
        }
        // return view('backend.user.createUser',compact('data','lowerCourt',['nextSerialNumber' => $nextSerialNumber]));
        return view('backend.user.highUserViva', compact('data', 'highCourt', 'batch', 'course', 'lastSerialNumber'));
    }
    public function userHighCreate()
    {
        $data = array();
        $data['active_menu'] = 'useralll';
        $data['page_title'] = 'Create User';
        if (request()->isMethod('post')) {
            try {
                if (request()->hasFile('image')) {
                    $extension = request()->file('image')->extension();
                    $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
                    request()->file('image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }
                UserHigh::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'image' => $photo_name,
                    'address' => request('address'),
                    'fathers_name' => request('fathers_name'),
                    'mothers_name' => request('mothers_name'),
                    'gpa' => request('gpa'),
                    'referred_by' => request('referred_by'),
                    'gpa_llm' => request('gpa_llm'),
                    'court_practice' => request('court_practice'),
                    'gender' => request('gender'),
                    'emergency_phone' => request('emergency_phone'),
                    'relation' => request('relation'),
                    'qualified_year' => request('qualified_year'),
                    'qualified_year_llm' => request('qualified_year_llm'),
                    'phone' => request('phone'),
                    'birth_date' => request('birth_date'),
                    'qualification' => request('qualification'),
                    'university' => request('university'),
                    'university_llm' => request('university_llm'),
                    'password' => bcrypt(request('password')),
                    'confirm_password' => bcrypt(request('confirm_password')),
                ]);
                return redirect()->back()->with('success', 'Event Created Successfully');
            } catch (PDOException $e) {
                return redirect()->back()->with('error', 'Failed Please Try Again');
            }
        }
        return view('backend.user.createUserHigh', compact('data'));
    }
    public function user_all_high()
    {
        $data = array();
        $data['active_menu'] = 'user';
        $data['page_title'] = 'User List';
        $user = User::where('high_court')->orderBy('id', 'desc')->get();
        return view('backend.user.user_list_high', compact('data', 'user'));
    }
    //userHighPrint
    public function userHighPrint($id)
    {
        $user = User::find($id);
        $data = [
            'title' => 'welcome to FerozLaw',
            'date' => date('m/d/Y'),
            'coursePay' => $user,
        ];

        $pdf = PDF::loadView('userHighPrint', compact('data', 'user'));
        return $pdf->stream('student_details.pdf');

        // return view('userHighPrint',compact('data', 'user'));
    }
    //userLowerPrint
    public function userLowerPrint($id)
    {

        $user = User::find($id);

        $data = [
            'title' => 'welcome to FerozLaw',
            'date' => date('m/d/Y'),
            'coursePay' => $user,
        ];

        $pdf = PDF::loadView('userLowerPrint', compact('data', 'user'));
        return $pdf->stream('student_details.pdf');
        // return view('userLowerPrint',compact('data','user'));
    }
    //userPayment
    public function userPayment($id)
    {
        $data = array();
        $data['active_menu'] = 'course_Pay';
        $data['page_title'] = 'Create Course Pay';
        $user = User::find($id);
        $users = User::select('id', 'name', 'phone', 'serial_number')->get();
        $course = Event::select('id', 'title')->get();
        $batch = Batch::select('id', 'batch_name')->get();
        if (request()->isMethod('post')) {
            CoursePay::create([
                'student_id' => request()->student_id,
                'course_id' => request()->course_id,
                'admissionCost' => request()->admissionCost,
                'month' => request()->month,
                'batch_id' => request()->batch_id,
                'cost' => request()->cost,
                'paid_amount' => request()->paid_amount,
                'due_amount' => request()->due_amount,
            ]);

            $userCost = StudentCost::where('student_id', request()->student_id)->first();
            $BatchAttendance = BatchAttendance::where('student_id', request()->student_id)->first();
            if (!$BatchAttendance) {
                $BatchAttendance = new BatchAttendance();
                $BatchAttendance->student_id = request()->student_id;
                $BatchAttendance->batch_id = request()->batch_id;
                $BatchAttendance->save();
            } else {
            }
            if (!$userCost) {
                $userCost = new StudentCost();
                $userCost->student_id = request()->student_id;
                $userCost->student_cost = request()->cost;
                $userCost->save();
            } else {
            }

            return redirect('/course/list')->with('success', 'Course Pay Created Successfully');
        }

        return view('backend.userPayment.user_payment', compact('data', 'user', 'users', 'course', 'batch'));
    }
}
