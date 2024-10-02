<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminUserIndex extends Component
{
    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
    }
    public function render()
    {
        return view('livewire.admin-user-index', [
            'users' => User::all()
        ]);
    }
}
