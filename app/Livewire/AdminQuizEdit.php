<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminQuizEdit extends Component
{
    public $id; // To hold the ID of the quiz being edited
    public $title;
    public $topic;
    public $time;
    public $number_of_questions;
    public $level;

    protected $rules = [
        'title' => 'required|string|max:255',
        'topic' => 'required|string|max:255',
        'time' => 'required|integer',
        'number_of_questions' => 'required|integer',
        'level' => 'required|string|max:255',
    ];

    public function mount($id)
    {
        $this->id = $id;
        $this->loadQuiz();
    }

    public function loadQuiz()
    {
        $quiz = Quiz::find($this->id);
        if ($quiz) {
            $this->title = $quiz->title;
            $this->topic = $quiz->topic;
            $this->time = $quiz->time;
            $this->number_of_questions = $quiz->number_of_questions;
            $this->level = $quiz->level;
        }
    }

    public function update()
    {
        $this->validate();

        $quiz = Quiz::find($this->id);
        if ($quiz) {
            $quiz->title = $this->title;
            $quiz->topic = $this->topic;
            $quiz->time = $this->time;
            $quiz->number_of_questions = $this->number_of_questions;
            $quiz->level = $this->level;
            $quiz->save();

            session()->flash('success', 'Quiz "' . $quiz->title . '" has been updated successfully!');
        } else {
            session()->flash('error', 'Quiz not found.');
        }

        return redirect()->route('admin.quiz');
    }


    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-quiz-edit');
    }
}
