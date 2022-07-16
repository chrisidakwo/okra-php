<?php

namespace Okra\Identity\GetIdentityByCustomerDate;

use Okra\Http\Request\HttpPostRequest;
use Okra\Support\Helpers;

class GetIdentityByCustomerDateRequest extends HttpPostRequest
{
    private const URI = 'identity/getByCustomerDate';

    public function __construct(string $customerId, string $startDate, string $endDate, int $limit = 10, string $page = null)
    {
        Helpers::assertStringIsDate($startDate);
        Helpers::assertStringIsDate($endDate);

        $data = [
            'customer' => $customerId,
            'from' => $startDate,
            'to' => $endDate,
            'limit' => $limit
        ];

        if (null !== $page) {
            $data['page'] = $page;
        }

        parent::__construct(self::URI, $data);
    }
}
