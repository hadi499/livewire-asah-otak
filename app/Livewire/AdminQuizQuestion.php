<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Question;

class AdminQuizQuestion extends Component
{
    public $title = 'question-create';
    public $quiz;
    public $questions;
    public $question_text;
    public $option_a;
    public $option_b;
    public $option_c;
    public $correct_answer;

    public function back()
    {
        return $this->redirect('/admin/quiz', navigate: true);
    }

    public function mount(Quiz $quiz)
    {
        // Set quiz dan ambil semua pertanyaan terkait quiz tersebut
        $this->quiz = $quiz;
        $this->questions = Question::where('quiz_id', $quiz->id)->get();
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
        $this->questions = Question::where('quiz_id', $this->quiz->id)->get();

        // Optional: redirect atau mengatur pesan notifikasi
        session()->flash('message', 'Pertanyaan berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.admin-quiz-question', [
            'quiz' => $this->quiz,
            'questions' => $this->questions,
        ]);
    }
}
