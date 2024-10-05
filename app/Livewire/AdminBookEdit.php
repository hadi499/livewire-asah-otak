<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class AdminBookEdit extends Component
{

    public $title;
    public $id;

    public function mount(Book $book)
    {
        $this->id = $book->id;
        $this->title = $book->title;
    }


    protected $rules = [
        'title' => 'required|string|max:255',
    ];

    public function update()
    {
        // Validasi data
        $this->validate();
        $book = Book::find($this->id);
        if ($book) {
            $book->title = $this->title;
            $book->save();
            session()->flash('success', 'book "' . $book->title . '" has been updated successfully!');
        } else {
            session()->flash('error', 'book not found.');
        }
        return redirect()->route('admin.books');
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-book-edit');
    }
}
