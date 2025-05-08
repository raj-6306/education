<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Quiz;
use App\Models\Topic;
use App\Models\UserView;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

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
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $topic = Topic::findOrFail($topicId);

        // Assume each question has a related 'options' attribute (array or collection)
        $questions = Quiz::where('topic_id', $topicId)->get();
        // return $questions;die;
        return view('test.paper', compact('topic', 'questions'));
    }
    public function submitQuiz(Request $request, $topicId)
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
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
    public function certificate(){
        return view('test.certificate');    
    }
    public function download(Request $request){
        // return view('certificates.certificate');
        $requiredBadges = $request->input('badge_required');
        $studentId = session('student_id');
        $studentName = session('student_name');
        $totalBadges = UserView::where('student_id', $studentId)->sum('marks');

    if ($totalBadges < $requiredBadges) {
        return back()->with('fail', 'You need at least ' . $requiredBadges . ' badges.');
    }
    $remainingBadges = $totalBadges - $requiredBadges;
    $userViews = UserView::where('student_id', $studentId)->get();
    $remainingSet = false;
    foreach ($userViews as $userView) {
        if (!$remainingSet) {
            $userView->marks = $remainingBadges;
            $userView->save();
            $remainingSet = true;
        } else {
            $userView->marks = 0;
            $userView->save();
        }
    }
    if($requiredBadges==100){
        $path = public_path('assets/dummy/certificate.jpg');
    }elseif($requiredBadges==200){
        $path = public_path('assets/dummy/certificae2.jpg');
    }elseif($requiredBadges==500){
        $path = public_path('assets/dummy/crtificate3.jpg');
    }
    // $pdf = Pdf::loadView('certificates.certificate', [
    //     'name' => session('student_name'),
    //     'badge' => $requiredBadges
    // ]);

    return response()->download($path, 'certificate.jpg');
    }
    public function logical(){
        $classes=Classes::all();
        return view('test.logic',['classes'=>$classes]);
    }
    public function showlogical($id){
        $quizzes = Quiz::where('quizzes.class_id', $id)
        ->leftJoin('subjects', 'subjects.id', '=', 'quizzes.subject_id')
        ->leftJoin('topics', 'topics.id', '=', 'quizzes.topic_id')
        ->select('quizzes.*', 'subjects.name as subject_name', 'topics.name as topic_name')
        ->get();
        // dd($quizzes);
    return view('test.logical', compact('quizzes'));
    }
    public function LogicalStore(Request $request){
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
    
        $studentId = session('student_id');
        $answers = $request->input('answers', []);
        $quizIds = $request->input('quiz_id', []);
    
        $totalMarks = 0;
        $correctCount = 0;
        $incorrectCount = 0;
    
        $topicIds = []; // collect unique topic_ids for all submitted questions
    
        foreach ($quizIds as $quizId) {
            $question = Quiz::find($quizId);
    
            if (!$question) continue;
    
            $topicIds[] = $question->topic_id; // gather topic IDs
            $selectedOption = $answers[$quizId] ?? null;
    
            if (!$selectedOption) continue;
    
            if ($selectedOption === $question->answer) {
                $totalMarks += (int) $question->marks;
                $correctCount++;
            } else {
                $incorrectCount++;
            }
        }
    
        $topicIds = array_unique($topicIds);
    
        // Store result for each topic (if multiple topics are involved)
        foreach ($topicIds as $topicId) {
            UserView::updateOrCreate(
                ['topic_id' => $topicId, 'student_id' => $studentId],
                [
                    'quiz_id' => implode(',', $quizIds),
                    'marks' => $totalMarks,
                    'status' => 0,
                    'updated_at' => now(),
                ]
            );
        }
    
        $feedback = "{$correctCount} Correct, {$incorrectCount} Incorrect";
    
        return redirect()->route('logical')->with('success', "Quiz submitted successfully. Result: {$feedback}");
    
    }
}
