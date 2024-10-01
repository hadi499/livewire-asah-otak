<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        'role' => 'required',

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

        Auth::login($user);

        session()->flash('message', 'User registered successfully!');
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
