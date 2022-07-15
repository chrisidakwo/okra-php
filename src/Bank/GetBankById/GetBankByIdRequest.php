<?php

namespace Okra\Bank\GetBankById;

use Okra\Http\Request\HttpGetRequest;

class GetBankByIdRequest extends HttpGetRequest
{
    private const URI = 'banks/getById';

    private string $bankId;

    /**
     * @param string $bankId
     */
    public function __construct(string $bankId)
    {
        $this->bankId = $bankId;
    }

    /**
     * @inheritDoc
     */
    public function getUrl(): string
    {
        return sprintf('%s?id=%s', self::URI, $this->bankId);
    }
}
