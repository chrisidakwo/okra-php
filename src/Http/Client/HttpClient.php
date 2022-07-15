<?php

namespace Okra\Http\Client;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Okra\Http\Request\Contracts\HttpGetRequest;
use Okra\Http\Request\Contracts\HttpPostRequest;

interface HttpClient
{
    /**
     * Makes a POST request.
     *
     * @param HttpPostRequest $request
     * @return string
     * @throws GuzzleException
     * @throws JsonException
     */
    public function post(HttpPostRequest $request): string;

    /**
     * Makes a GET request.
     *
     * @param HttpGetRequest $request
     * @return string
     * @throws GuzzleException
     */
    public function get(HttpGetRequest $request): string;
}
