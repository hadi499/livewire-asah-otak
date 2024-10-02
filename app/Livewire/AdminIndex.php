<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminIndex extends Component
{
    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-index');
    }
}
