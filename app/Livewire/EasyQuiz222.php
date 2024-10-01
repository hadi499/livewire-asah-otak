<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class EasyQuiz extends Component
{
  public $title;
  public $quizzes;
  public $quiz;
  public $questions;
  public $answers = [];
  public $score = 0;
  public $incorrectQuestions = [];

  public function back()
  {
    return $this->redirect('/quiz', navigate: true);
  }

  public function mount($level = 'Easy')
  {
    $this->title = 'Quiz Easy';
    $this->quizzes = Quiz::where('level', $level)->get();
  }

  public function startEasy(Quiz $quiz)
  {
    $this->quiz = $quiz;
    $this->questions = $quiz->questions;
    $this->score = 0; // Reset score
    $this->incorrectQuestions = []; // Reset incorrect questions
    $this->title = $quiz->title;
  }

  public function submitEasy()
  {
    // Reset score dan pertanyaan yang salah
    $this->score = 0;
    $this->incorrectQuestions = [];

    foreach ($this->questions as $question) {
      if (isset($this->answers[$question->id])) {
        if ($this->answers[$question->id] == $question->correct_answer) {
          $this->score += 1;
        } else {
          $this->incorrectQuestions[] = [
            'question' => $question->question_text,
            'your_answer' => 'Jawaban Anda: ' . $this->answers[$question->id],
            'correct_answer' => $question->correct_answer
          ];
        }
      } else {
        $this->incorrectQuestions[] = [
          'question' => $question->question_text,
          'your_answer' => 'Tidak dijawab',
          'correct_answer' => $question->correct_answer
        ];
      }
    }

    // Untuk tujuan debugging, Anda dapat menambahkan session flash atau log jika perlu
  }
  public function render()
  {
    return view('livewire.easy-quiz', [
      'quizzes' => $this->quizzes,
      'quiz' => $this->quiz,
      'questions' => $this->questions,
      'score' => $this->score,
      'incorrectQuestions' => $this->incorrectQuestions
    ]);
  }
}
