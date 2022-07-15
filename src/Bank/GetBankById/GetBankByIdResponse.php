<?php

namespace Okra\Bank\GetBankById;

use JsonException;
use Okra\Bank\Entities\Bank;
use Okra\Http\Response\HttpResponse;

class GetBankByIdResponse extends HttpResponse
{
    /**
     * @return Bank
     * @throws JsonException
     */
    public function getBank(): Bank
    {
        $data = $this->getResponse()['data'];

        return new Bank($data);
    }
}
