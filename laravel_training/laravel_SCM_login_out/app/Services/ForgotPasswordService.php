<?php

namespace App\Services;

use App\Contracts\Dao\ForgotPasswordDaoInterface;
use App\Contracts\Services\ForgotPasswordServiceInterface;
use Illuminate\Http\Request;

class ForgotPasswordService implements ForgotPasswordServiceInterface
{
    private $forgotPassword;

    public function __construct(ForgotPasswordDaoInterface $forgotPassword)
    {
        $this->forgotPassword = $forgotPassword;
    }

    public function submitForgetPasswordForm(Request $request)
    {
        return $this->forgotPassword->submitForgetPasswordForm($request);
    }

    public function submitResetPasswordForm(Request $request)
    {
        return $this->forgotPassword->submitResetPasswordForm($request);
    }
}
