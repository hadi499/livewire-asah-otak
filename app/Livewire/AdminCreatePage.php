<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class AdminCreatePage extends Component
{
    use WithFileUploads;

    public $book_id; // Foreign key for book
    public $image;
    public $english;
    public $indonesian;
    public $book;
    public $title;

    public function deletePage($pageId)
    {
        $page = Page::find($pageId);
        $page->delete();
        // $this->dispatch('dispatch-page-delete')->to(AdminCreatePage::class);
    }

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->title = $book->title;
    }

    protected $rules = [
        // 'book_id' => 'required|exists:books,id', // Ensure book exists
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
            'book_id' => $this->book->id,
            'image' => $imagePath,
            'english' => $this->english,
            'indonesian' => $this->indonesian,
        ]);

        // Reset input form
        $this->reset(['book_id', 'image', 'english', 'indonesian']);

        // Feedback sukses
        session()->flash('message', 'Page successfully created!');
        // return redirect()->route('admin.books');
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-create-page', [
            'books' => Book::all(),
            'pages' => Page::where('book_id', $this->book->id)
                ->orderBy('created_at', 'desc')->get()


        ]);
    }
}
