<?php

namespace Okra\Bank\GetListOfBanks;

use Okra\Http\Request\HttpGetRequest;

class GetListOfBanksRequest extends HttpGetRequest
{
    private const URI = 'banks/list';

    /**
     * @inheritDoc
     */
    public function getUrl(): string
    {
        return self::URI;
    }
}
