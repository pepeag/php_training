<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface ForgotPasswordServiceInterface{
    public function submitForgetPasswordForm(Request $request);

    public function submitResetPasswordForm(Request $request);
}
