<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    //
    public function index(){
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $subjects=Subject::leftJoin('classes','subjects.class_id','classes.id')
        ->select('subjects.id as id','subjects.name as name','classes.name as class_name')->get();
        // return $subjects;die;
        return view('learning.index',['subjects'=>$subjects]);
    }
}
