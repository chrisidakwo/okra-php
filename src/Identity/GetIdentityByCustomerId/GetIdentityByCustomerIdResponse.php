<?php

namespace Okra\Identity\GetIdentityByCustomerId;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\HasIdentityResponse;

class GetIdentityByCustomerIdResponse extends HttpResponse
{
    use HasIdentityResponse;
}
