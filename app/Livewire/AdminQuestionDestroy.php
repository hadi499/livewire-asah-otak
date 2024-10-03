<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;
use Livewire\Attributes\On;

class AdminQuestionDestroy extends Component
{
    public $question;

    public function mount(Question $question)
    {
        $this->question = $question;
    }

    public function destroy()
    {
        $this->question->delete();
        $this->confirmingDelete = false;
        $this->dispatch('dispatch-question-delete')->to(AdminQuizQuestion::class);
    }

    #[On('dispatch-question-list')]
    public function render()
    {
        return view('livewire.admin-question-destroy');
    }
}
