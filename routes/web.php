<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopicController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/create-storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginCheck'])->name('login.check');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-save',[LoginController::class,'save'])->name('register.save');
Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');
Route::get('/subject-add',[SubjectController::class,'add'])->name('subject.add');
Route::post('/subject-add',[SubjectController::class,'store'])->name('subject.store');
Route::get('/subject-edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
Route::post('/subject-update/{id}', [SubjectController::class, 'update'])->name('subject.update');
Route::delete('/subject-delete/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');
Route::get('/learning',[LearningController::class,'index'])->name('learning.index');
Route::get('/topic-list/{id}',[TopicController::class,'index'])->name('topic.list');
Route::get('/topic-add/{sid}', [TopicController::class, 'add'])->name('topic.add');
Route::get('/topic-edit/{id}', [TopicController::class, 'edit'])->name('topic.edit');
Route::post('/topic-update/{id}', [TopicController::class, 'update'])->name('topic.update');
Route::delete('/topic-delete/{id}', [TopicController::class, 'destroy'])->name('topic.destroy');
Route::post('/topic-store',[TopicController::class,'store'])->name('topic.store');
Route::get('/classes',[ClassController::class,'index'])->name('class.index');
Route::get('/class-add',[ClassController::class,'add'])->name('class.add');
Route::post('/class-add',[ClassController::class,'store'])->name('class.store');
Route::get('/classes/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
Route::post('/classes/update/{id}', [ClassController::class, 'update'])->name('class.update');
Route::delete('/classes/delete/{id}', [ClassController::class, 'destroy'])->name('class.destroy');
Route::get('/quizzes', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz-add', [QuizController::class, 'add'])->name('quiz.add');
Route::post('/quiz-store', [QuizController::class, 'store'])->name('quiz.store');
Route::get('/quiz-edit/{id}', [QuizController::class, 'edit'])->name('quiz.edit');
Route::post('/quiz-update/{id}', [QuizController::class, 'update'])->name('quiz.update');
Route::delete('quiz/{id}', [QuizController::class, 'destroy'])->name('quiz.destroy');
Route::get('/class-subject/{id}', [SubjectController::class, 'show'])->name('subject.details');
Route::get('/topic-view/{id}',[TopicController::class,'show'])->name('topic.view');
Route::get('/testes',[TestController::class,'index'])->name('test.index');
Route::get('/test-view/{id}',[TestController::class,'takeQuiz'])->name('test.start');
Route::post('/test-submit/{id}', [TestController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('/certificate', [TestController::class, 'certificate'])->name('certificate');
Route::post('/certificate/download', [TestController::class, 'download'])->name('certificate.download');
Route::get('/logical', [TestController::class, 'logical'])->name('logical');
Route::get('/all-logical-reasoning/{id}', [TestController::class, 'showlogical'])->name('logical.details');
Route::post('/logical-store', [TestController::class, 'LogicalStore'])->name('Logical.Store');












