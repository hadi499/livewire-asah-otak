<?php

use App\Livewire\Home;
use App\Livewire\Books;
use App\Livewire\Login;
use App\Livewire\EasyQuiz;
use App\Livewire\EditUser;
use App\Livewire\ShowBook;
use App\Livewire\AdminBook;
use App\Livewire\AdminQuiz;
use App\Livewire\QuizIndex;
use App\Livewire\AdminIndex;
use App\Livewire\AdminScore;
use App\Livewire\CreateQuiz;
use App\Livewire\CreateUser;
use App\Livewire\MediumQuiz;
use App\Livewire\AdminQuizEdit;
use App\Livewire\QuizComponent;
use App\Livewire\AdminUserIndex;
use App\Livewire\AdminBookCreate;
use App\Livewire\AdminCreatePage;
use App\Livewire\AdminQuizCreate;
use App\Livewire\AdminQuizQuestion;
use App\Livewire\QuestionComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\AdminQuizQuestionEdit;
use App\Http\Controllers\LogoutController;

Route::middleware(['auth'])->group(function () {

  Route::get('/', Home::class)->name('home');
  Route::middleware('userAkses:admin')->group(function () {
    Route::get('/admin', AdminIndex::class)->name('admin');
    Route::get('/admin/quiz', AdminQuiz::class)->name('admin.quiz');
    Route::get('/admin/score', AdminScore::class)->name('admin.score');
    Route::get('/admin/users', AdminUserIndex::class)->name('admin.users');
    Route::get('/admin/books', AdminBook::class)->name('admin.books');
    Route::get('/admin/books/create', AdminBookCreate::class)->name('admin.books.create');
    Route::get('/admin/pages/create', AdminCreatePage::class)->name('admin.pages.create');
    Route::get('/admin/user/register', CreateUser::class)->name('admin.user.register');
    Route::get('/admin/user/edit/{userId}', EditUser::class)->name('admin.user.edit');
    Route::get('/admin/quiz/create', AdminQuizCreate::class)->name('admin.create.quiz');
    Route::get('/admin/quiz/edit/{id}', AdminQuizEdit::class)->name('admin.quiz.edit');
    Route::get('admin/question/create/{quiz}', AdminQuizQuestion::class)->name('admin.question.create');
    Route::get('/admin/quiz/question/{question}/edit', AdminQuizQuestionEdit::class)->name('quiz.question.edit');
  });

  Route::get('/quiz', QuizIndex::class)->name('quiz.index');
  Route::get('/books', Books::class)->name('books.index');
  Route::get('/books/{book}', ShowBook::class)->name('books.show');
  Route::get('/quiz/easy', EasyQuiz::class)->name('quiz.easy');
  Route::get('/quiz/medium', MediumQuiz::class)->name('quiz.medium');
  // Route::get('/quiz/{level}', QuizComponent::class)->name('quiz.level');
  Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});


Route::get('/login', Login::class)->name('login');
