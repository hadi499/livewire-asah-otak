<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminQuizQuestionEdit extends Component
{
    public $question;
    public $question_text;
    public $option_a;
    public $option_b;
    public $option_c;
    public $correct_answer;

    public function mount(Question $question)
    {
        // Set pertanyaan dan pre-fill input dari data pertanyaan yang ada
        $this->question = $question;
        $this->question_text = $question->question_text;
        $this->option_a = $question->option_a;
        $this->option_b = $question->option_b;
        $this->option_c = $question->option_c;
        $this->correct_answer = $question->correct_answer;
    }

    public function update()
    {
        // Validasi input
        $this->validate([
            'question_text' => 'required|string|max:255',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'correct_answer' => 'required'
        ]);

        // Update pertanyaan
        $this->question->update([
            'question_text' => $this->question_text,
            'option_a' => $this->option_a,
            'option_b' => $this->option_b,
            'option_c' => $this->option_c,
            'correct_answer' => $this->correct_answer,
        ]);

        // Redirect ke halaman quiz dengan pesan sukses
        session()->flash('success', 'Pertanyaan berhasil diperbarui!');
        return redirect()->to('/admin/question/create/' . $this->question->quiz_id);
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-quiz-question-edit');
    }
}
