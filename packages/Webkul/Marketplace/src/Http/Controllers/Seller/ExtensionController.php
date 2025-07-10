<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\View\View;
use Webkul\Marketplace\Facades\Extension;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('marketplace::seller.extensions.index')
            ->with([
                'extensions' => Extension::getAvailableExtensions(),
                'tags'       => Extension::getAllTags(),
            ]);
    }
}
