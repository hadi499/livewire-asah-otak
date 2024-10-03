<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('quiz')]
class QuizIndex extends Component
{
    public function render()
    {
        return view('livewire.quiz-index');
    }
}
