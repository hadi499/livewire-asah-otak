<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminQuizCreate extends Component
{
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


    public function store()
    {
        $this->validate();

        $quiz = new Quiz();
        $quiz->title = $this->title;
        $quiz->topic = $this->topic;
        $quiz->time = $this->time;
        $quiz->number_of_questions = $this->number_of_questions;
        $quiz->level = $this->level;
        $quiz->save();

        session()->flash('success', 'Quiz "' . $quiz->title . '" has been added successfully!');

        return redirect()->route('admin.quiz');
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-quiz-create');
    }
}
