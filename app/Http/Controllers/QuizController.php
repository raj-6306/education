<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $quizzes = Quiz::leftJoin('classes', 'quizzes.class_id', '=', 'classes.id')
            ->leftJoin('subjects', 'quizzes.subject_id', '=', 'subjects.id')
            ->leftJoin('topics', 'quizzes.topic_id', '=', 'topics.id')
            ->select(
                'quizzes.*',
                'classes.name as class_name',
                'subjects.name as subject_name',
                'topics.name as topic_name'
            )
            ->orderBy('quizzes.id', 'desc')
            ->get();
                // return $quizzes;die;
        return view('quizzes.index', compact('quizzes'));
    }

        public function add()
        {
            $classes = Classes::all(); // Assuming model name is ClassModel
            $subjects = Subject::all();
            $topics = Topic::all();
    
            return view('quizzes.add', compact('classes', 'subjects', 'topics'));
        }
    
        public function store(Request $request)
        {
            // return $request->all();die;
            $validated = $request->validate([
                'class_id' => 'required|exists:classes,id',
                'subject_id' => 'required|exists:subjects,id',
                'topic_id' => 'required|exists:topics,id',
                'quiz_type' => 'required|in:2,4',
                'question' => 'required|string',
                'answer' => 'required|string',
                'marks' => 'required|numeric|min:1',
            ]);
    
            // Save the quiz
            $quiz = new Quiz();
            $quiz->class_id = $request->class_id;
            $quiz->subject_id = $request->subject_id;
            $quiz->topic_id = $request->topic_id;
            $quiz->quiz_type = $request->quiz_type;
            $quiz->question = $request->question;
            $quiz->answer = $request->answer;
            $quiz->marks = $request->marks;
    
            // Store options as JSON or separate fields based on your DB
            $quiz->option_1 = $request->option_1;
            $quiz->option_2 = $request->option_2;
            
            if ($request->quiz_type == 4) {
                $quiz->option_3 = $request->option_3;
                $quiz->option_4 = $request->option_4;
            }
    
            // $quiz->options = json_encode($options); // Assuming `options` is a TEXT or JSON field in DB
            $quiz->save();
    
            return redirect()->route('quiz.index')->with('success', 'Quiz created successfully!');
        }
    public function edit($id)
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $quiz = Quiz::leftJoin('classes', 'quizzes.class_id', '=', 'classes.id')
            ->leftJoin('subjects', 'quizzes.subject_id', '=', 'subjects.id')
            ->leftJoin('topics', 'quizzes.topic_id', '=', 'topics.id')
            ->select('quizzes.*', 'classes.name as class_name', 'subjects.name as subject_name', 'topics.name as topic_name')
            ->where('quizzes.id', $id)
            ->first();

        $classes = Classes::all();
        $subjects = Subject::all();
        $topics = Topic::all();
        // return $quiz;die;
        return view('quizzes.edit', compact('quiz', 'classes', 'subjects', 'topics'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            'topic_id' => 'required',
            'quiz_type' => 'required|in:2,4',
            'question' => 'required|string',
            'answer' => 'required|string',
            'marks' => 'required|numeric',
            'option_1' => 'required|string',
            'option_2' => 'required|string',
        ]);

        // Initialize the quiz model
        $quiz = Quiz::findOrFail($id);

        // Update the basic details
        $quiz->class_id = $request->class_id;
        $quiz->subject_id = $request->subject_id;
        $quiz->topic_id = $request->topic_id;
        $quiz->quiz_type = $request->quiz_type;
        $quiz->question = $request->question;
        $quiz->answer = $request->answer;
        $quiz->marks = $request->marks;

        // Update options based on quiz_type
        $quiz->option_1 = $request->option_1;
        $quiz->option_2 = $request->option_2;

        if ($request->quiz_type == 4) {
            $request->validate([
                'option_3' => 'required|string',
                'option_4' => 'required|string',
            ]);
            $quiz->option_3 = $request->option_3;
            $quiz->option_4 = $request->option_4;
        }

        // Save the updated quiz
        $quiz->save();

        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully!');
    }

    public function destroy($id)
    {
        // Find the quiz by its ID
        $quiz = Quiz::find($id);

        if ($quiz) {
            // Delete the quiz
            $quiz->delete();

            return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully!');
        }

        return redirect()->route('quiz.index')->with('fail', 'Quiz not found!');
    }
}
