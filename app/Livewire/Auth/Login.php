<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function login()
    {
        $validated = $this->validate();

        try {
            if (auth()->attempt([
                'email' => $validated['email'],
                'password' => $validated['password'],
            ], true)) {
                $this->redirectRoute('home', navigate: true);
            } else {
                $this->dispatch('toast',
                    message: 'Email or password is wrong. ',
                    success: false,
                );
            }
        } catch (\Throwable $th) {
            $this->dispatch('toast',
                message: 'Something went wrong, please try again later.',
                success: false,
            );
        }
    }

    #[Title('Login | Jersipedia')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
