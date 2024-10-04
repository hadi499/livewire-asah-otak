<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class AdminEditPage extends Component
{
    use WithFileUploads;

    public $page_id; // ID dari halaman yang sedang diedit
    public $book_id; // Foreign key untuk buku
    public $image;
    public $newImage; // Untuk menyimpan gambar baru jika diunggah
    public $english;
    public $indonesian;

    protected $rules = [
        'book_id' => 'required|exists:books,id',
        'newImage' => 'nullable|image|max:1024', // Gambar baru opsional, max 1MB
        'english' => 'nullable|string',
        'indonesian' => 'nullable|string',
    ];

    // Memuat data halaman saat komponen di-mount
    public function mount($pageId)
    {
        $page = Page::findOrFail($pageId);
        $this->page_id = $page->id;
        $this->book_id = $page->book_id;
        $this->image = $page->image; // Menyimpan gambar saat ini
        $this->english = $page->english;
        $this->indonesian = $page->indonesian;
    }

    public function updatePage()
    {
        // Validasi input
        $this->validate();

        // Jika ada gambar baru, upload dan update path-nya
        if ($this->newImage) {
            $imagePath = $this->newImage->store('images');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang sudah ada
            $imagePath = $this->image;
        }

        // Update halaman di database
        $page = Page::findOrFail($this->page_id);
        $page->update([
            'book_id' => $this->book_id,
            'image' => $imagePath,
            'english' => $this->english,
            'indonesian' => $this->indonesian,
        ]);

        // Feedback sukses
        // session()->flash('success', 'Page successfully updated!');
        return redirect()->to('/admin/pages/create/' . $this->book_id)->with('success', 'Page successfully updated!');
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-edit-page', [
            'books' => Book::all(), // Semua buku untuk dropdown pilihan
            'page' => Page::findOrFail($this->page_id), // Halaman yang sedang diedit
        ]);
    }
}
