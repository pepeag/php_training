<?php

namespace App\Dao;

use App\Contracts\Dao\ForgotPasswordDaoInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordDao implements ForgotPasswordDaoInterface
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $token = Str::random(64);

        DB::table('password_resets')->insert([

            'email' => $request->email,

            'token' => $token,

            'created_at' => Carbon::now(),

        ]);

        return $token;
    }

    public function isResetFormExists($email, $token)
    {
        return DB::table("password_resets")->where([

            'email' => $email,

            'token' => $token,

        ])->first();
    }

    public function submitResetPasswordForm(Request $request)
    {
        if ($this->isResetFormExists($request->email, $request->token)) {

            $user = User::where("email", $request->email)->update([
                "password" => Hash::make($request->password),
            ]);
            DB::table('password_resets')->where(['email' => $request->email])->delete();
        }

        return $user;
    }
}
