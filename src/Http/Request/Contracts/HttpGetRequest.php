<?php

namespace Okra\Http\Request\Contracts;

interface HttpGetRequest
{
    /**
     * @param array $headers
     * @return self
     */
    public function setHeaders(array $headers): self;

    /**
     * Returns the URL for the GET request.
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Get extra headers for the request.
     *
     * @return array
     */
    public function getHeaders(): array;
}
