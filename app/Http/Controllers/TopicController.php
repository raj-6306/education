<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use App\Models\UserView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TopicController extends Controller
{
    //
    public function index($id) {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $topics = Topic::join('subjects', 'topics.subject_id', '=', 'subjects.id')
        ->where('topics.subject_id', $id)
        ->select('topics.*', 'subjects.name as subject_name','topics.id as id')
        ->get();
       return view('topic.index',['topics'=>$topics,'sid'=>$id]);
    }
    public function  add($id) {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $subjects = Subject::all();
       return view('topic.add',['subjects'=>$subjects,'sid'=>$id]);
    }
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'topic_name' => 'required|string|max:255',
            'topic_description' => 'nullable|string',
            'video' => 'nullable|mimes:mp4,mov,avi,mkv|max:204800', // max 200MB
        ]);

        try {
            $videoPath = null;

            // Handle video upload
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('videos', 'public');
            }

            // Create the topic
            Topic::create([
                'subject_id' => $request->subject_id,
                'name' => $request->topic_name,
                'description' => $request->topic_description,
                'video_path' => $videoPath,
                'created_at' => now(),
            ]);

            return redirect()->route('topic.list', $request->subject_id)->with('success', 'Topic created successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Failed to create topic. Please try again.');
        }
    }

    public function edit($id) {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
    
        $topic = Topic::findOrFail($id);
        $subjects = Subject::all();
    
        return view('topic.edit', compact('topic', 'subjects'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'topic_name' => 'required|string|max:255',
            'topic_description' => 'nullable|string',
            'video' => 'nullable|mimes:mp4,mov,avi,mkv|max:204800',
        ]);
    
        try {
            $topic = Topic::findOrFail($id);
    
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('videos', 'public');
                $topic->video_path = $videoPath;
            }
    
            $topic->subject_id = $request->subject_id;
            $topic->name = $request->topic_name;
            $topic->description = $request->topic_description;
            $topic->save();
    
            return redirect()->route('topic.list', $request->subject_id)->with('success', 'Topic updated successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Failed to update topic. Please try again.');
        }
    }
    
    public function destroy($id) {
        try {
            $topic = Topic::findOrFail($id);
            $subjectId = $topic->subject_id;
            $topic->delete();
    
            return redirect()->route('topic.list', $subjectId)->with('success', 'Topic deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Failed to delete topic. Please try again.');
        }
    }
    public function show($topicId)
    {
        try {
            $topic = Topic::leftJoin('subjects', 'subjects.id', '=', 'topics.subject_id')
            ->select('topics.*', 'subjects.name as subject_name')
            ->where('topics.id', $topicId)
            ->first();
            // If topic is not found
            if (!$topic) {
                if (!session('student_id')) {
                    return redirect()->route('login')->with('fail', 'Please login first.');
                }
                // Log view attempt anyway
                return redirect()->route('topics.index')->with('fail', 'Topic not found.');
            }
            $userview = UserView::updateOrInsert(
                ['topic_id' => $topicId, 'student_id' => session('student_id')],
                [
                    'status' => 1,
                    'marks' => 0,
                ]
            );            
            // If topic exists, return view
            if($userview){
                return view('topic.topic-view', compact('topic'));
            }else{
                return redirect()->route('topics.index')->with('fail', 'Topic not found.');  
            }

        } catch (\Exception $e) {
            return($e->getMessage());die;
            Log::error('Error in show method: ' . $e->getMessage(), [
                'topic_id' => $topicId,
                'student_id' => session('student_id')
            ]);
            return redirect()->route('topics.index')->with('fail', 'An error occurred. Please try again later.');
        }
    }


}
