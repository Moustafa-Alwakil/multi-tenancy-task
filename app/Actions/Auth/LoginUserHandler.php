<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginUserHandler
{
    public function __construct(
        public Request $request
    ) {
        //
    }

    public function handle()
    {
        $attemptToLogin = auth()->attempt([
            'email' => $this->request->get('email'),
            'password' => $this->request->get('password')
        ]);

        if (!$attemptToLogin) {
            throw ValidationException::withMessages(['email' => 'These credentials does not match our records.']);
        }
    }
}
