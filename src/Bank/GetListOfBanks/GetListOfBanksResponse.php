<?php

namespace Okra\Bank\GetListOfBanks;

use JsonException;
use Okra\Bank\Entities\Bank;
use Okra\Http\Response\HttpResponse;

class GetListOfBanksResponse extends HttpResponse
{
    /**
     * @return Bank[]
     * @throws JsonException
     */
    public function getBanks(): array
    {
        $banks = $this->getResponse()['data']['banks'];

        return array_map(function ($bank) {
            return new Bank($bank);
        }, $banks);
    }
}
