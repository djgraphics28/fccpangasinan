<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Church;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $church;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'church' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'church_id' => $this->church,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        session()->flash('message', 'Registration successful.');

        return redirect()->route('dashboard'); // Change 'dashboard' to the route you want to redirect to
    }

    public function render()
    {
        return view('livewire.register', [
            'churches' => Church::all()
        ]);
    }
}
