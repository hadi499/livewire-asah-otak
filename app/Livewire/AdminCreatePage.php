<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCreatePage extends Component
{
    use WithFileUploads;

    public $book_id; // Foreign key for book
    public $image;
    public $english;
    public $indonesian;

    protected $rules = [
        'book_id' => 'required|exists:books,id', // Ensure book exists
        'image' => 'nullable|image|max:1024', // Max file size is 1MB
        'english' => 'nullable|string',
        'indonesian' => 'nullable|string',
    ];

    public function createPage()
    {
        // Validasi input
        $this->validate();

        // Handle image upload
        $imagePath = $this->image ? $this->image->store('images') : null;

        // Simpan halaman ke database
        Page::create([
            'book_id' => $this->book_id,
            'image' => $imagePath,
            'english' => $this->english,
            'indonesian' => $this->indonesian,
        ]);

        // Reset input form
        $this->reset(['book_id', 'image', 'english', 'indonesian']);

        // Feedback sukses
        session()->flash('message', 'Page successfully created!');
    }

    public function render()
    {
        return view('livewire.admin-create-page', [
            'books' => Book::all()
        ]);
    }
}
