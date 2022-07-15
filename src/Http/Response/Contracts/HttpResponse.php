<?php

namespace Okra\Http\Response\Contracts;

use JsonException;
use Okra\Exceptions\RequestFailed;

interface HttpResponse
{
    /**
     * @return array
     * @throws JsonException|RequestFailed
     */
    public function getResponse(): array;
}
