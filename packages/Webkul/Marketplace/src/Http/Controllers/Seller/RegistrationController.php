<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Core\Rules\Slug;
use Webkul\Marketplace\Repositories\SellerRepository;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected SellerRepository $sellerRepository) {}

    /**
     * Display the registration form.
     */
    public function index(): View
    {
        return view('marketplace::seller.sign-up');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:marketplace_sellers,email'],
            'url'      => ['required', 'unique:marketplace_sellers,url', 'lowercase', new Slug],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $this->sellerRepository->create(array_merge($validated, [
            'is_approved' => ! core()->getConfigData('marketplace.settings.seller.approval_required'),
        ]));

        return to_route('seller.session.index')
            ->withSuccess(trans('marketplace::app.seller.signup.success'));
    }
}
