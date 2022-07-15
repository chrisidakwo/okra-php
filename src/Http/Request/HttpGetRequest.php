<?php

namespace Okra\Http\Request;

abstract class HttpGetRequest implements Contracts\HttpGetRequest
{
    /**
     * Request headers.
     *
     * @var array $headers
     */
    protected array $headers = [];

    /**
     * @inheritDoc
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
