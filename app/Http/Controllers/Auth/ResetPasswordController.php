<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Mail\Message;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    // Use the ResetsPasswords trait if you are not overriding
    use \Illuminate\Foundation\Auth\ResetsPasswords;

    // Set the redirect path after password reset
    protected $redirectTo = '/home';

    /**
     * Show the password reset request form.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Handle a password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Attempt to send the password reset link
        $response = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the reset link was successfully sent
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Password reset link sent to your email!');
        }

        return back()->withErrors(['email' => Lang::get($response)]);
    }

    /**
     * Send the password reset email directly (manual email sending).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendCustomResetLink(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->input('email');

        // Find user by email
        $user = User::where('email', $email)->first();

        if ($user) {
            // Generate reset token
            $token = Password::createToken($user); // Laravel's built-in way to create a token

            // Send custom password reset link via email
            Mail::send('emails.password_reset', ['token' => $token], function (Message $message) use ($email) {
                $message->to($email)
                        ->subject('Password Reset Link')
                        ->from('no-reply@yourdomain.com', 'Your App Name');
            });

            return back()->with('status', 'Password reset link sent to your email!');
        }

        return back()->withErrors(['email' => 'No account found with that email address.']);
    }
}
