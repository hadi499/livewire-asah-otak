<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Question;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('questions')]
class AdminQuizQuestion extends Component
{
    public $title = 'question-create';
    public $quiz;
    public $questions;
    public $totalQuestions;
    public $question_text;
    public $option_a;
    public $option_b;
    public $option_c;
    public $correct_answer;

    public function back()
    {
        return $this->redirect('/admin/quiz', navigate: true);
    }

    public function deleteQuestion($questionId)
    {
        $question = Question::find($questionId);
        $question->delete();
        $this->dispatch('dispatch-question-list')->to(AdminQuizQuestion::class);
    }

    public function mount(Quiz $quiz)
    {
        // Set quiz dan ambil semua pertanyaan terkait quiz tersebut
        $this->quiz = $quiz;
        $this->totalQuestions = Question::where('quiz_id', $this->quiz->id)->count();
        $this->questions = Question::where('quiz_id', $this->quiz->id)
            ->orderBy('created_at', 'desc')->get();
    }



    public function store()
    {
        // Validasi input
        $this->validate([
            'question_text' => 'required|string|max:255',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'correct_answer' => 'required'
        ]);

        // Simpan pertanyaan baru
        Question::create([
            'quiz_id' => $this->quiz->id,
            'question_text' => $this->question_text,
            'option_a' => $this->option_a,
            'option_b' => $this->option_b,
            'option_c' => $this->option_c,
            'correct_answer' => $this->correct_answer,
        ]);

        // Reset form dan perbarui daftar pertanyaan
        $this->reset(['question_text', 'option_a', 'option_b', 'option_c', 'correct_answer']);
        $this->questions = Question::where('quiz_id', $this->quiz->id)
            ->orderBy('created_at', 'desc')->get();
        $this->totalQuestions = Question::where('quiz_id', $this->quiz->id)->count();
    }


    #[Layout('components.layouts.admin-app')]
    #[On('dispatch-question-delete')]
    #[On('dispatch-question-list')]
    public function render()
    {
        return view('livewire.admin-quiz-question', [
            'quiz' => $this->quiz,
            'questions' => $this->questions,
        ]);
    }
}
