<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('user lists')]
class AdminUserIndex extends Component
{
    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.admin-user-index', [
            'users' => User::all()
        ]);
    }
}
