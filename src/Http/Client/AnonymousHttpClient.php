<?php

namespace Okra\Http\Client;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Utils;
use Okra\Http\Request\Contracts\HttpGetRequest;
use Okra\Http\Request\Contracts\HttpPostRequest;

class AnonymousHttpClient implements HttpClient
{
    private GuzzleHttpClient $http;

    /**
     * @param GuzzleHttpClient $httpClient
     */
    public function __construct(GuzzleHttpClient $httpClient)
    {
        $this->http = $httpClient;
    }

    /**
     * @inheritDoc
     */
    public function post(HttpPostRequest $request): string
    {
        $requestBody = json_encode($request->getBody(), JSON_THROW_ON_ERROR);

        $response = $this->http->post($request->getUrl(), [
            'body' => $requestBody
        ]);

        return Utils::jsonEncode(Utils::jsonDecode($response->getBody(), true, 512, JSON_PRETTY_PRINT));
    }

    /**
     * @inheritDoc
     */
    public function get(HttpGetRequest $request): string
    {
        $response = $this->http->get($request->getUrl());

        return Utils::jsonEncode(Utils::jsonDecode($response->getBody(), true, 512, JSON_PRETTY_PRINT));
    }

    /**
     * @return GuzzleHttpClient
     */
    public function getHttpClient(): GuzzleHttpClient
    {
        return $this->http;
    }
}
