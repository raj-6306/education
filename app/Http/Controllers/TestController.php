<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Topic;
use App\Models\UserView;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(){
        $studentId = session('student_id');

        $topics = UserView::leftJoin('topics', 'topics.id', '=', 'user_views.topic_id')
            ->leftJoin('subjects', 'subjects.id', '=', 'topics.subject_id')
            // ->where('user_views.status', 1)
            ->where('user_views.student_id', $studentId)
            ->select(
                'user_views.*',
                'topics.name as topic_name',
                'topics.description as topic_description',
                'topics.video_path',
                'subjects.name as subject_name',
                'subjects.id as subject_id'
            )
            ->get();
        // return $topics;die;
        return view('test.index', compact('topics'));
    }
    public function takeQuiz($topicId)
    {
        $topic = Topic::findOrFail($topicId);

        // Assume each question has a related 'options' attribute (array or collection)
        $questions = Quiz::where('topic_id', $topicId)->get();
        // return $questions;die;
        return view('test.paper', compact('topic', 'questions'));
    }
    public function submitQuiz(Request $request, $topicId)
    {
        $studentId = session('student_id') ; 
        $answers = $request->input('answers', []);
        $quizIds = $request->input('quiz_id', []); 

        $totalMarks = 0;
        $correctCount = 0;
        $incorrectCount = 0;

        foreach ($quizIds as $quizId) {
            $question = Quiz::find($quizId);
            // return $question->answer;die;
            if (!$question) {
                continue;
            }
            $selectedOption = $answers[$quizId] ?? null;
            // return $selectedOption;die;
            if (!$selectedOption) {
                continue;
            }

            if ($selectedOption === $question->answer) {
                $totalMarks += (int) $question->marks;
                $correctCount++;
            } else {
                $incorrectCount++;
            }
        }
        UserView::where('topic_id',$topicId)->where('student_id',$studentId)->update([
            'topic_id' => $topicId,
            'student_id' => $studentId,
            'quiz_id' => implode(',', $quizIds),  
            'marks' => $totalMarks,
            'status' => 0, 
            'updated_at'=>now()
        ]);
        $feedback = "{$correctCount} Correct, {$incorrectCount} Incorrect";
        return redirect()->route('test.index')->with('success',"Quiz submitted successfully.Result {$feedback}");
    }
}
