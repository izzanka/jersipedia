<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|string|unique:users,name')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function register()
    {
        $validated = $this->validate();

        try {

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'image' => 'https://ui-avatars.com/api/?name='.$validated['name'].'&rounded=true',
            ]);

            auth()->login($user);

            $this->redirectRoute('home', navigate: true);

        } catch (\Throwable $th) {
            $this->dispatch('toast',
                message: 'Something went wrong, please try again later.',
                success: false,
            );
        }
    }

    #[Title('Register | Jersipedia')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
