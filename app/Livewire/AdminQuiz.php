<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class AdminQuiz extends Component
{

    public function deleteQuiz($quizId)
    {
        $quiz = Quiz::find($quizId);

        if ($quiz) {
            $quiz->delete();
            session()->flash('success', 'Quiz "' . $quiz->title . '" has been deleted successfully!');
        } else {
            session()->flash('error', 'Quiz not found.');
        }
    }


    public function render()
    {

        return view('livewire.admin-quiz', [
            'quizzes' => Quiz::all(),
        ]);
    }
}
