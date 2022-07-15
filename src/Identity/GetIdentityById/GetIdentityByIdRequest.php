<?php

namespace Okra\Identity\GetIdentityById;

use Okra\Http\Request\HttpPostRequest;

class GetIdentityByIdRequest extends HttpPostRequest
{
    private const URI = 'identity/getById';

    /**
     * @param string $id
     * @param int $limit
     * @param string|null $page
     */
    public function __construct(string $id, int $limit = 10, string $page = null)
    {
        $requestData = [
            'id' => $id,
            'limit' => $limit,
        ];

        if (null !== $page) {
            $requestData['page'] = $page;
        }

        parent::__construct(self::URI, $requestData);
    }
}
