<?php

namespace Okra\Http\Response\Contracts;

use GuzzleHttp\Exception\InvalidArgumentException;
use Okra\Exceptions\RequestFailed;

interface HttpResponse
{
    /**
     * @return array
     * @throws RequestFailed|InvalidArgumentException
     */
    public function getResponse(): array;
}
