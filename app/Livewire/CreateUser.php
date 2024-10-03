<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;

#[Title('create user')]
class CreateUser extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role = 'staff'; // default role

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:3',
        'password_confirmation' => 'required|same:password',
        'role' => 'required|in:staff,admin',

    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,

        ]);

        session()->flash('success', 'User registered successfully!');
        return redirect()->route('admin.users');
    }
    #[Layout('components.layouts.admin-app')]
    public function render()
    {
        return view('livewire.create-user');
    }
}
