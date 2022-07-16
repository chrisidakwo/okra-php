<?php

namespace Okra\Identity\RcVerify;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\HasCompanyVerificationResponse;

class RcVerifyResponse extends HttpResponse
{
    use HasCompanyVerificationResponse;
}
