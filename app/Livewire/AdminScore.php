<?php

namespace App\Livewire;

use App\Models\Result;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('score')]
class AdminScore extends Component
{

    public function deleteResultAll()
    {
        // Hapus semua record dari tabel results
        Result::truncate();

        // Redirect ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'All results have been deleted successfully!');
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-score', [
            'results' => Result::orderBy('created_at', 'desc')->get()
        ]);
    }
}
