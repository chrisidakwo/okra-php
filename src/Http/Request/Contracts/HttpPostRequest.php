<?php

namespace Okra\Http\Request\Contracts;

use GuzzleHttp\Exception\InvalidArgumentException;

interface HttpPostRequest
{
    /**
     * Returns the URL for the POST request.
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param array|null $data
     * @return self
     */
    public function setBody(array $data = []): self;

    /**
     * @param array $headers
     * @return self
     */
    public function setHeaders(array $headers): self;

    /**
     * Returns the body (data) for the POST request.
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function getBody(): string;

    /**
     * Get extra headers for the request.
     *
     * @return array
     */
    public function getHeaders(): array;
}
