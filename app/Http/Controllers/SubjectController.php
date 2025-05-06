<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }

        $subjects = Subject::with('class')->get();
        return view('subject.add', compact('subjects'));
    }

    public function add()
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }

        $classes = Classes::all();
        return view('subject.add',['classes'=>$classes]);
    }

    public function store(Request $request)
    {
        // return $request->all();die;
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id'
        ]);

        try {
            Subject::create([
                'class_id' => $request->class_id,
                'name' => $request->subject_name,
            ]);
            return redirect()->route('learning.index')->with('success', 'Subject added successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Failed to add subject. Please try again.');
        }
    }

    public function edit($id)
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $subject = Subject::findOrFail($id);
        $classes = Classes::all();
        return view('subject.edit', compact('subject', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id'
        ]);

        try {
            $subject = Subject::findOrFail($id);
            $subject->update([
                'name' => $request->subject_name,
                'class_id' => $request->class_id,
            ]);
            return redirect()->route('learning.index')->with('success', 'Subject updated successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Failed to update subject.');
        }
    }

    public function destroy($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $subject->delete();
            return redirect()->route('learning.index')->with('success', 'Subject deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Failed to delete subject.');
        }
    }
    public function show($classId)
    {
        // Get the subjects and their topics based on class_id
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $subjects = Subject::where('class_id', $classId)->get();
        $class_name=Classes::where('id',$classId)->value('name');
        $topics = Subject::leftJoin('topics', 'subjects.id', '=', 'topics.subject_id')
            ->where('subjects.class_id', $classId)
            ->select(
                'subjects.id as subject_id',
                'subjects.name as subject_name',
                'topics.id as topic_id',
                'topics.name as topic_name'
            )
            ->get();
        return view('classes.class-details', compact('subjects', 'topics','class_name'));
    }
}
