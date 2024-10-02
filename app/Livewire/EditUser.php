<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;

class EditUser extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,{{userId}}', // ignore current user email on unique check
        'password' => 'nullable|string|min:3', // Password tidak wajib diisi saat edit
        'password_confirmation' => 'nullable|same:password', // Sama dengan password
        'role' => 'required|in:staff,admin',
    ];

    public function mount($userId)
    {
        $user = User::findOrFail($userId);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable|min:3|confirmed',
            'password_confirmation' => 'same:password',
        ]);

        $user = User::findOrFail($this->userId);

        // Update user data
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => $this->password ? Hash::make($this->password) : $user->password, // Only update password if provided
        ]);

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('admin.users');
    }

    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.edit-user');
    }
}
