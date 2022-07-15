<?php

namespace Okra\Identity\RcVerify;

use Okra\Http\Request\HttpPostRequest;

class RcVerifyRequest extends HttpPostRequest
{
    private const URI = 'products/kyc/rc-verify';

    /**
     * @param string $rcNumber
     * @param string $companyName
     */
    public function __construct(string $rcNumber, string $companyName)
    {
        parent::__construct(self::URI, [
            'rc_number' => $rcNumber,
            'company_name' => $companyName,
        ]);
    }
}
