<?php

namespace Okra\Identity\FetchIdentities;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Traits\HasIdentityResponse;

class FetchIdentitiesResponse extends HttpResponse
{
    use HasIdentityResponse;
}
