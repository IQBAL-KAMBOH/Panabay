<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;

class SessionController extends Controller
{
    /**
     * Redirect to the login page.
     */
    public function __invoke(): RedirectResponse
    {
        return to_route('seller.session.index');
    }

    /**
     * Display the resource to create a new seller session.
     */
    public function show(): View|RedirectResponse
    {
        return auth()->guard('seller')->check()
            ? to_route('seller.dashboard.index')
            : view('marketplace::seller.sign-in');
    }

    /**
     * Create a new seller session.
     */
    public function create(Request $request): RedirectResponse
    {
        if (! auth()->guard('seller')->attempt($request->only(['email', 'password']))) {
            return back()->withError(trans('marketplace::app.seller.login.invalid-credentials'));
        }

        $seller = auth()->guard('seller')->user();

        if ($seller->channels->where('id', core()->getCurrentChannel()->id)->isEmpty()) {
            auth()->guard('seller')->logout();

            return back()->withError(trans('marketplace::app.seller.login.invalid-credentials'));
        }

        if (! $seller->is_approved) {
            auth()->guard('seller')->logout();

            return back()->withInfo(trans('marketplace::app.seller.login.not-approved'));
        }

        if ($seller->parent_id) {
            $permissions = $seller->role?->permissions ?? [];

            $firstPermission = collect($permissions)->first();

            if ($firstPermission) {
                $roles = marketplace_acl()->getRoles();

                $routeKey = $roles->search($firstPermission);

                if ($routeKey) {
                    return to_route($routeKey);
                }
            }
        }

        return to_route('seller.dashboard.index');
    }

    /**
     * Destroy the seller session.
     */
    public function destroy(): RedirectResponse
    {
        Event::dispatch('marketplace.seller.account.logout.before');

        auth()->guard('seller')->logout();

        Event::dispatch('marketplace.seller.account.logout.after');

        return to_route('seller.session.index');
    }
}
