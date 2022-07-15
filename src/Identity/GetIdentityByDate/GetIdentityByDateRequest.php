<?php

namespace Okra\Identity\GetIdentityByDate;

use Okra\Http\Request\HttpPostRequest;
use Okra\Support\Helpers;

class GetIdentityByDateRequest extends HttpPostRequest
{
    private const URI = 'identity/getByDate';

    /**
     * @param string $startDate
     * @param string $endDate
     * @param int $limit
     * @param string|null $page
     */
    public function __construct(string $startDate, string $endDate, int $limit = 10, string $page = null)
    {
        Helpers::assertStringIsDate($startDate);
        Helpers::assertStringIsDate($endDate);

        $data = [
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
