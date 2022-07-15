<?php

namespace Okra\Identity\RcAndTinVerify;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\HasCompanyVerificationResponse;

class RcAndTinVerifyResponse extends HttpResponse
{
    use HasCompanyVerificationResponse;
}
