<?php

namespace Okra\Identity\GetIdentityByCustomerId;

use Okra\Http\Request\HttpPostRequest;

class GetIdentityByCustomerIdRequest extends HttpPostRequest
{
    private const URI = 'identity/getByCustomer';

    /**
     * @param string $customerId
     * @param int $limit
     * @param string|null $page
     */
    public function __construct(string $customerId, int $limit = 10, string $page = null)
    {
        $requestData = [
            'customer' => $customerId,
            'limit' => $limit,
        ];

        if (null !== $page) {
            $requestData['page'] = $page;
        }

        parent::__construct(self::URI, $requestData);
    }
}
