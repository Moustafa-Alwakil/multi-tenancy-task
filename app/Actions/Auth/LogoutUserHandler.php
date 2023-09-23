<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutUserHandler
{
    public function __construct(
        public Request $request
    ) {
        //
    }

    public function handle()
    {
        Auth::logout();

        $this->request->session()->invalidate();

        $this->request->session()->regenerateToken();
    }
}
