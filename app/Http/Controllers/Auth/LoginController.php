<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Student;
use App\Models\UserView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function  login()  {
        return view('Auth.login');
    }
    public function loginCheck(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Attempt to find student by email
        $student = Student::where('email', $request->email)->first();
    
        if ($student && Hash::check($request->password, $student->password)) {
            session()->put('role', $student->role_id);
            session()->put('student_id', $student->id);
            session()->put('student_name', $student->name);
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        } else {
            return back()->with('fail', 'Invalid email or password.')->withInput();
        }
    }
    public function register()  {
        return view('Auth.register');
    }
    public function save(Request $request)
    {
    // Validation
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'password' => 'required|string|min:6|same:confirm_password',
        'confirm_password' => 'required|string|min:6',
    ]);
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Save the student
    $saved = Student::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), 
    ]);

    if ($saved) {
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    } else {
        return back()->with('fail', 'Registration failed. Please try again.');
    }
    }
    public function dashboard(){
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
       $classes=Classes::all();
       $totalMarks = UserView::where('student_id', session('student_id'))->sum('marks');
        return view('dashboard',['classes'=>$classes,'totalMarks'=>$totalMarks]);
    }
    public function logout()
    {
        session()->flush(); 
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
