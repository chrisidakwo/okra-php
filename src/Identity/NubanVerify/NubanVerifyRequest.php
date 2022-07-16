<?php

namespace Okra\Identity\NubanVerify;

use Okra\Http\Request\HttpPostRequest;

class NubanVerifyRequest extends HttpPostRequest
{
    public const URI = 'products/kyc/nuban-verify';

    public function __construct(string $nuban, string $bankId)
    {
        parent::__construct(self::URI, [
            'nuban' => $nuban,
            'bank' => $bankId,
        ]);
    }
}
