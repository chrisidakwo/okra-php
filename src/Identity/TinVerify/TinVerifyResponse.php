<?php

namespace Okra\Identity\TinVerify;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\HasCompanyVerificationResponse;

class TinVerifyResponse extends HttpResponse
{
    use HasCompanyVerificationResponse;
}
