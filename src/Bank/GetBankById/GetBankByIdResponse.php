<?php

namespace Okra\Bank\GetBankById;

use GuzzleHttp\Exception\InvalidArgumentException;
use Okra\Bank\Entities\Bank;
use Okra\Exceptions\RequestFailed;
use Okra\Http\Response\HttpResponse;

class GetBankByIdResponse extends HttpResponse
{
    /**
     * @return Bank
     * @throws RequestFailed|InvalidArgumentException
     */
    public function getBank(): Bank
    {
        $data = $this->getResponse()['data'];

        return new Bank($data);
    }
}
