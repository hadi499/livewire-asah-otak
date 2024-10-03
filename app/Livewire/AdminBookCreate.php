<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminBookCreate extends Component
{
    public $title;

    protected $rules = [
        'title' => 'required|string|max:255',
    ];

    public function createBook()
    {
        // Validasi data
        $this->validate();

        // Simpan buku ke database
        Book::create([
            'title' => $this->title,
        ]);

        session()->flash('message', 'Book successfully created!');
        return redirect()->route('admin.books');
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-book-create');
    }
}
