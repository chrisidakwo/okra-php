<?php

namespace Okra\Identity\BvnVerify;

use Okra\Http\Request\HttpPostRequest;

class BvnVerifyRequest extends HttpPostRequest
{
    private const URI = 'products/kyc/bvn-verify';

    /**
     * @param string $bvn
     */
    public function __construct(string $bvn)
    {
        parent::__construct(self::URI, [
            'bvn' => $bvn,
        ]);
    }
}
