<?php

namespace Okra\Identity\VerifyCustomer;

use Okra\Http\Request\HttpPostRequest;

class VerifyCustomerRequest extends HttpPostRequest
{
    private const URI = 'products/kyc/customer-verify';

    /**
     * @param string $customerId
     */
    public function __construct(string $customerId)
    {
        parent::__construct(self::URI, [
            'customer' => $customerId,
        ]);
    }
}
