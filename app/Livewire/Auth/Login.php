<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

 public $email;
    public $password;

    public $rules = [
        'email' => 'required||email',
        'password' => 'required|min:6|max:6'
    ];
    protected $messages = [
        'email.required' => 'email é obrigatorio',
        'email.email' => 'formato de email incorreto',
        'password.required' => 'senha é obrigatoria',
        'password.min' => 'senha deve conter no minimo 6 caracteres',
        'password.max' => 'senha deve conter no maximo 6 caracteres'
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }
    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

           if(Auth::user()->user_type === 'user'){
            return redirect()->route('dashboard');
           }
        }
        
        session()->flash('error', 'Email ou senha incorretos');
    }
}
