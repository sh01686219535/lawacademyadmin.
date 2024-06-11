<?php

namespace App\Http\Controllers;

use App\Mail\UserVerification;
use App\Models\Contact;
use App\Models\Event;
use App\Models\RealEvent;
use App\Models\User;
use App\Models\Advocate;
use App\Models\Attendance;
use App\Models\Batch;
use App\Models\CoursePay;
use App\Models\HighCourt;
use App\Models\LowerCourt;
use App\Models\Notice;
use App\Models\OurTeam;
use App\Models\Review;
use App\Models\UserEvent;
use App\Models\UserHigh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use DB;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{

    public function eventRegister()
    {
        $user = JWTAuth::parseToken()->authenticate();
        if ($user) {
            try {
                $event = UserEvent::create([
                    'user_id' => request('user_id'),
                    'event_id' => request('event_id'),
                    'person' => request('person'),
                    'transport' => request('transport'),
                    'total_Amount' => request('total_Amount'),
                ]);
                return response()->json($event, 200);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }
    }
    //LowerCourtRegister
    public function LowerCourtRegister()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email',
            // 'password' => 'required',
            // 'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        if (request()->hasFile('image')) {
            $extension = request()->file('image')->extension();
            $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
            request()->file('image')->move('backend/img/user/', $photo_name);
        }else{
            $photo_name=null;
        }
        $lowerCourt = LowerCourt::select('id')->get();
        $lowerCourtId = $lowerCourt->isEmpty() ? null : $lowerCourt->first()->id;
        $user = User::create([
            'name'=> request('name'),
            'email'=>request('email'),
            'lower_court'=>$lowerCourtId,
            'image'=>$photo_name,
            'address'=>request('address'),
            'referred_by'=>request('referred_by'),
            'fathers_name'=>request('fathers_name'),
            'mothers_name'=>request('mothers_name'),
            'gpa'=>request('gpa'),
            'gpa_llm'=>request('gpa_llm'),
            'court_practice'=>request('court_practice'),
            'gender'=>request('gender'),
            'emergency_phone'=>request('emergency_phone'),
            'relation'=>request('relation'),
            'qualified_year'=>request('qualified_year'),
            'qualified_year_llm'=>request('qualified_year_llm'),
            'phone'=>request('phone'),
            'birth_date'=>request('birth_date'),
            'qualification'=>request('qualification'),
            'university'=>request('university'),
            'university_llm'=>request('university_llm'),
            'password'=>bcrypt(request('password')),
            'confirm_password'=>bcrypt(request('confirm_password')),
        ]);

        return response()->json([
            'status' => 'ok',
            'message' => 'User CReated'
        ]);
    }
    //highCourtRegister
    public function highCourtRegister()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email',
            // 'password' => 'required',
            // 'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        if (request()->hasFile('image')) {
            $extension = request()->file('image')->extension();
            $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
            request()->file('image')->move('backend/img/user/', $photo_name);
        }else{
            $photo_name=null;
        }
        $highCourt = HighCourt::select('id')->get();
        $highCourtId = $highCourt->isEmpty() ? null : $highCourt->first()->id;
        $user = User::create([
            'name'=> request('name'),
            'email'=>request('email'),
            'high_court'=>$highCourtId,
            'image'=>$photo_name,
            'address'=>request('address'),
            'referred_by'=>request('referred_by'),
            'fathers_name'=>request('fathers_name'),
            'mothers_name'=>request('mothers_name'),
            'gpa'=>request('gpa'),
            'gpa_llm'=>request('gpa_llm'),
            'court_practice'=>request('court_practice'),
            'gender'=>request('gender'),
            'emergency_phone'=>request('emergency_phone'),
            'relation'=>request('relation'),
            'qualified_year'=>request('qualified_year'),
            'qualified_year_llm'=>request('qualified_year_llm'),
            'phone'=>request('phone'),
            'birth_date'=>request('birth_date'),
            'qualification'=>request('qualification'),
            'university'=>request('university'),
            'university_llm'=>request('university_llm'),
            'password'=>bcrypt(request('password')),
            'confirm_password'=>bcrypt(request('confirm_password')),
        ]);

        return response()->json([
            'status' => 'ok',
            'message' => 'User CReated'
        ]);
    }
    public function userRegister()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        if (request()->hasFile('image')) {
            $extension = request()->file('image')->extension();
            $photo_name = "backend/img/user/" . uniqid() . '.' . $extension;
            request()->file('image')->move('backend/img/user/', $photo_name);
        }
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'confirm_password' => bcrypt(request('confirm_password')),
        ]);
        $code = sha1(rand(1000, 8000));
        $user->UserVerify()->create([
            'code' => $code
        ]);
        $generatedUrl = route('user.verify', [$user->email, $code]);
        Mail::to($user->email)->send(new UserVerification($generatedUrl));
        return response()->json([
            'status' => 'ok',
            'message' => 'User CReated'
        ]);
    }
    //email verify
    //user email verify
    public function verify($email, $code)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            if ($user->email_verified == 'no') {
                $userCode = $user->UserVerify->code;
                if ($userCode == $code) {
                    $user->update([
                        'email_verified' => 'yes'
                    ]);
                    $user->UserVerify->delete();
                    return '<strong style="font-size: xx-large;">Congratulations! Your email has been successfully verified, and your account is now ready for use.Please go and login in your account</strong>';
                } else {
                    return '<strong style="font-size: xx-large;">Unauthorized Data!!!</strong>';
                }
            }else{
                return '<strong style="font-size: xx-large;"> Your email has already been verified</strong>';
            }
        } else {
            return '<strong style="font-size: xx-large;">Unauthorized</strong>';
        }
    }
    //userLogin
    public function userLogin()
    {
        $credentials = request()->only('email','password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = JWTAuth::user();

        if ($user) {

            $userData = User::select('id', 'name', 'phone','email_verified', 'email', 'address')->find($user->id);
            if ($userData) {
                $cookie = cookie('jwt', $token, 60 * 24);
                return response()->json([
                    'status' => 'ok',
                    'token' => $token,
                    'user' => $userData,

                ])->withCookie($cookie);
            } else {
                return response()->json(['error' => 'User not found or has missing columns.'], 404);
            }
        } else {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }
    }
    public function eventData()
    {
        $event = RealEvent::all();
        return response()->json($event, 200);
    }
    public function userData()
    {
        $event = User::select('id', 'name', 'email', 'image', 'phone', 'address', 'status', 'email_verified', 'user_status')->where('user_status', 'userEnable')->get();
        return response()->json($event, 200);
    }
    //event_user_counts
    public function event_user_counts()
    {
        $userEvent = UserEvent::selectRaw('event_id, COUNT(user_id) as total_user')
        ->groupBy('event_id')
        ->get();

     return response()->json($userEvent);
    }
    //profileProgress
    public function profileProgress()
    {
        try {
            $user = JWTAuth::user();
            $profileCompletion = $this->calculateProfileCompletion($user);
            return response()->json([
                'userProfileBar' => $profileCompletion,
            ], 200);
        }catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    private function calculateProfileCompletion($user)
    {
        $profileFields = ['name', 'email', 'phone','password','confirm_password','address','image','specialist','working_place'];
        $completedFields = 0;

        foreach ($profileFields as $field) {
            if (!empty($user->$field)) {
                $completedFields++;
            }
        }
        // Calculate the percentage
        $profileCompletionPercentage = ($completedFields / count($profileFields)) * 100;

        return round($profileCompletionPercentage, 2);
    }
    //courseAll
    public function courseAll(){
        $course = Event::all();
        return response()->json($course);
    }
    //contact
    public function contact()
    {
        $contact = Contact::create([
            'name' => request('name'),
            'email' => request('email'),
            'subject' => request('subject'),
            'phone' => request('phone'),
            'description' => request('description'),
        ]);
        return response()->json($contact, 200);
    }
    public function studentAll()
    {
        $student = User::select('name','image')->where('status','approved')->get();
        return response()->json($student);
    }
    //advocateList
    public function advocateList(){
        $advocate = Advocate::all();
        return response()->json($advocate);
    }
    //OurTeamList
    public function OurTeamList()
    {
        $ourTeam = OurTeam::all();
        return response()->json($ourTeam);
    }
    //noticeList
    public function noticeList()
    {
        $ourTeam = Notice::all();
        return response()->json($ourTeam);
    }
    //attendance
    public function attendance()
    {
        $user = User::where('serial_number', request('serial_id'))->first();

        // Check if user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Fetch batch by student_id
        $batch = CoursePay::where('student_id', $user->id)->first();
    
        // Check if batch exists
        if (!$batch) {
            return response()->json(['error' => 'Batch not found'], 404);
        }
    
        // Create attendance record
        $attendance = Attendance::create([
            'serial_id' => request('serial_id'),
            'batch_id' =>  $batch->batch_id,
            'status' => 'present',
            'checkIn' => request('checkIn'),
        ]);
    
        // Return success response
        

        return response()->json($attendance,200);
    }
    //batch
    public function batch()
    {
        $batch = Batch::all();
        return response()->json($batch,200);
    }
    //review
    public function review(){
        try {
            $user = JWTAuth::user();
            if ($user) {
            $userData = User::select('id','name')->find($user->id);
            $review = Review::create([
                'student_id' => $userData->id,
                'student_name' => $userData->name,
                'email' => request('email'),
                'review' => request('review'),
                'star' => request('star'),
            ]);
        }
        }catch (\Exception $e) {
            return $e;
        }
        return response()->json($review, 200);
    }
    //reviewGet
    public function reviewGet()
    {
        $review = Review::all();
        return response()->json($review,200);
    }
    //studentWiseData
    public function studentWiseData(){
        try {
            $user = JWTAuth::user();
        }catch (\Exception $e) {
            return $e;
        }
        return response()->json($user, 200);
    }
    //coursePay
    public function coursePay()
    {
        $coursePay = CoursePay::all();
        return response()->json($coursePay, 200);
    }
    //studentPayInfo
    public function studentPayInfo()
    {
        try {
            $user = JWTAuth::user();
            $userInfo=  $user->select('id','email')->find($user->id);
            if ($user) {
            $userData = User::select('id')->find($user->id);
            $coursePay = CoursePay::where('student_id', $userData->id)->first();
            if ($coursePay) {
                $studentId = $coursePay->student_id;
                $studentCourses = CoursePay::where('student_id', $studentId)->get();
            }
        }
        }catch (\Exception $e) {
            return $e;
        }
        return response()->json([
            'studentInfo'=>$userInfo,
            'student'=>$studentCourses,

        ],200);
    }


}
