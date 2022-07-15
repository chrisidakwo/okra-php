<?php

namespace Okra\Identity\NubanVerifyName;

use Okra\Http\Request\HttpPostRequest;

class NubanVerifyNameRequest extends HttpPostRequest
{
    private const URI = 'products/kyc/nuban-name-verify';

    public function __construct(string $nuban, string $bank)
    {
        parent::__construct(self::URI, [
            'nuban' => $nuban,
            'bank' => $bank,
        ]);
    }
}
