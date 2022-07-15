<?php

namespace Okra\Identity\GetIdentityByCustomerId;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\GetIdentityResponse;

class GetIdentityByCustomerIdResponse extends HttpResponse
{
    use GetIdentityResponse;
}
