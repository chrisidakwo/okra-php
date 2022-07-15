<?php

namespace Okra\Identity\FetchIdentities;

use Okra\Http\Request\HttpPostRequest;

class FetchIdentitiesRequest extends HttpPostRequest
{
    private const URI = 'products/identities';

    public function __construct()
    {
        parent::__construct(self::URI);
    }
}
