<?php



namespace App\Http\Controllers\Auth;

use App\Contracts\Services\ForgotPasswordServiceInterface;
use Carbon\Carbon;

use App\User;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;



class ForgotPasswordController extends Controller

{

    private $forgotPassword;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ForgotPasswordServiceInterface $forgotPassword)
    {
      $this->forgotPassword = $forgotPassword;
    }

      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function submitForgetPasswordForm(Request $request)

      {

          $request->validate([

              'email' => 'required|email|exists:users',

          ]);

          $token = $this->forgotPassword->submitForgetPasswordForm($request);

        //  dd($request->email);
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){

              $message->to($request->email);

              $message->subject('Reset Password');

          });

          return back()->with('message', 'We have e-mailed your password reset link!');

      }

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function showResetPasswordForm($token) {

         return view('auth.forgetPasswordLink', ['token' => $token]);

      }



      /**

       * Write code on Method

       *

       * @return response()

       */

      public function submitResetPasswordForm(Request $request)

      {
          $request->validate([

              'email' => 'required|email|exists:users',

              'password' => 'required|string|min:6|confirmed',

              'password_confirmation' => 'required'

          ]);


          $this->forgotPassword->submitResetPasswordForm($request);

          return redirect('/login')->with('message', 'Your password has been changed!');

      }


}
