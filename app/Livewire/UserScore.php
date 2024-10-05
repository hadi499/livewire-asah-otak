<?php

namespace App\Livewire;

use App\Models\Result;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('score users')]
class UserScore extends Component
{
    public function render()
    {
        return view('livewire.user-score', [
            'results' => Result::orderBy('created_at', 'desc')->get()
        ]);
    }
}
