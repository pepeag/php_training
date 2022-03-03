<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface ForgotPasswordDaoInterface{

    public function submitForgetPasswordForm(Request $request);

    public function submitResetPasswordForm(Request $request);
}
