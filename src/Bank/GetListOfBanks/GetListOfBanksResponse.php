<?php

namespace Okra\Bank\GetListOfBanks;

use GuzzleHttp\Exception\InvalidArgumentException;
use Okra\Bank\Entities\Bank;
use Okra\Exceptions\RequestFailed;
use Okra\Http\Response\HttpResponse;

class GetListOfBanksResponse extends HttpResponse
{
    /**
     * @return Bank[]
     * @throws RequestFailed|InvalidArgumentException
     */
    public function getBanks(): array
    {
        $banks = $this->getResponse()['data']['banks'];

        return array_map(function ($bank) {
            return new Bank($bank);
        }, $banks);
    }
}
