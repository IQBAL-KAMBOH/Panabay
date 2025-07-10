<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mime\Exception\RfcComplianceException;
use Webkul\Shop\Http\Requests\Customer\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('marketplace::seller.forgot-password');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ForgotPasswordRequest $request): RedirectResponse
    {
        try {
            $response = $this->broker()->sendResetLink($request->only(['email']));

            if ($response == Password::RESET_LINK_SENT) {
                return back()->withSuccess(trans('marketplace::app.seller.forgot-password.reset-link-sent'));
            }

            if ($response == Password::RESET_THROTTLED) {
                return back()->withWarning(trans('marketplace::app.seller.forgot-password.already-sent'));
            }

            return back()
                ->withInput($request->only(['email']))
                ->withErrors([
                    'email' => trans('marketplace::app.seller.forgot-password.email-not-exist'),
                ]);
        } catch (RfcComplianceException $e) {
            return back()->withSuccess(trans('marketplace::app.seller.forgot-password.reset-link-sent'));
        } catch (TransportException $e) {
            DB::table('seller_password_resets')->where('email', $request->input('email'))->delete();

            return back()->withError($e->getMessage());
        } catch (\Exception $e) {
            report($e);

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Get the broker to be used during password reset.
     */
    public function broker(): PasswordBroker
    {
        return Password::broker('sellers');
    }
}
