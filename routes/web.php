<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\EasyQuiz;
use App\Livewire\AdminQuiz;
use App\Livewire\AdminIndex;
use App\Livewire\CreateQuiz;
use App\Livewire\CreateUser;
use App\Livewire\AdminQuizEdit;
use App\Livewire\QuizComponent;
use App\Livewire\AdminQuizCreate;
use App\Livewire\AdminQuizQuestion;
use App\Livewire\QuestionComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;

Route::middleware(['auth'])->group(function () {

  Route::get('/', Home::class)->name('home');
  Route::middleware('userAkses:admin')->group(function () {
    Route::get('/admin', AdminIndex::class)->name('admin');
    Route::get('/admin/quiz', AdminQuiz::class)->name('admin.quiz');
    Route::get('/admin/quiz/create', AdminQuizCreate::class)->name('admin.create.quiz');
    Route::get('/admin/quiz/edit/{id}', AdminQuizEdit::class)->name('admin.quiz.edit');
    Route::get('admin/question/create/{quiz}', AdminQuizQuestion::class)->name('admin.question.create');
  });

  Route::get('/quiz/easy', EasyQuiz::class)->name('quiz.easy');
  // Route::get('/quiz/{level}', QuizComponent::class)->name('quiz.level');
  Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::get('/register', CreateUser::class)->name('register');
Route::get('/login', Login::class)->name('login');
