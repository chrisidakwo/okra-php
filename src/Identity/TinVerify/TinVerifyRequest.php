<?php

namespace Okra\Identity\TinVerify;

use Okra\Http\Request\HttpPostRequest;

class TinVerifyRequest extends HttpPostRequest
{
    private const URI = 'products/kyc/tin-verify';

    /**
     * @param string $tinNumber
     * @param string $companyName
     */
    public function __construct(string $tinNumber, string $companyName)
    {
        parent::__construct(self::URI, [
            'tin_number'=> $tinNumber,
            'company_name'=> $companyName,
        ]);
    }
}
