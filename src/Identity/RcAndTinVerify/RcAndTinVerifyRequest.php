<?php

namespace Okra\Identity\RcAndTinVerify;

use Okra\Http\Request\HttpPostRequest;

class RcAndTinVerifyRequest extends HttpPostRequest
{
    private const URI = 'products/kyc/rc-tin-verify';

    /**
     * @param string $rcNumber
     * @param string $tinNumber
     * @param string $companyName
     */
    public function __construct(string $rcNumber, string $tinNumber, string $companyName)
    {
        parent::__construct(self::URI, [
            'rc_number'=> $rcNumber,
            'tin_number'=> $tinNumber,
            'company_name'=> $companyName,
        ]);
    }
}
