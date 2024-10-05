<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminBook extends Component
{

    public function deleteBook($bookId)
    {
        $book = Book::find($bookId);

        if ($book) {
            $book->delete();
            session()->flash('success', 'book "' . $book->title . '" has been deleted successfully!');
        } else {
            session()->flash('error', 'book not found.');
        }
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-book', [
            'books' => Book::all()
        ]);
    }
}
