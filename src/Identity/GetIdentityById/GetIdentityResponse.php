<?php

namespace Okra\Identity\GetIdentityById;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\GetIdentityResponse as GetIdentityResponseTrait;

class GetIdentityResponse extends HttpResponse
{
    use GetIdentityResponseTrait;
}
