<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     */
    public function create(Request $request, $token = null): View
    {
        return view('marketplace::seller.reset-password')->with([
            'token' => $token,
            'email' => $request->input('email'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'token'    => ['required'],
                'email'    => ['required', 'email'],
                'password' => ['required', 'confirmed', 'min:6'],
            ]);

            $response = $this->broker()->reset(
                $request->only([
                    'email',
                    'password',
                    'password_confirmation',
                    'token',
                ]), function ($seller, $password) {
                    $this->resetPassword($seller, $password);
                }
            );

            if ($response == Password::PASSWORD_RESET) {
                return to_route('seller.session.index');
            }

            return back()
                ->withInput($request->input(['email']))
                ->withErrors([
                    'email' => trans($response),
                ]);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    /**
     * Reset the given seller password.
     */
    protected function resetPassword($seller, $password): void
    {
        $seller->password = Hash::make($password);

        $seller->save();

        event(new PasswordReset($seller));
    }

    /**
     * Get the broker to be used during password reset.
     */
    public function broker(): PasswordBroker
    {
        return Password::broker('sellers');
    }
}
