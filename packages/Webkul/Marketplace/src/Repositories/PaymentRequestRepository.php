<?php

namespace Webkul\Marketplace\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Marketplace\Contracts\PaymentRequest;

class PaymentRequestRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return PaymentRequest::class;
    }
}
