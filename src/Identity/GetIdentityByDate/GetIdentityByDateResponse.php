<?php

namespace Okra\Identity\GetIdentityByDate;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\HasIdentityResponse;

class GetIdentityByDateResponse extends HttpResponse
{
    use HasIdentityResponse;
}
