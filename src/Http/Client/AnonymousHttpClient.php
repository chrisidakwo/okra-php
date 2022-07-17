<?php

namespace Okra\Http\Client;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Okra\Exceptions\RequestFailed;
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
        try {
            $response = $this->http->post($request->getUrl(), [
                'body' => $request->getBody()
            ]);

            return Utils::jsonEncode(Utils::jsonDecode($response->getBody(), true, 512, JSON_PRETTY_PRINT));
        } catch (GuzzleException|ClientException $exception) {
            $response = Utils::jsonDecode($exception->getResponse()->getBody());

            throw new RequestFailed($response, sprintf('[Okra - %s] %s', $request->getUrl(), $response->message));
        }
    }

    /**
     * @inheritDoc
     */
    public function get(HttpGetRequest $request): string
    {
        try {
            $response = $this->http->get($request->getUrl());

            return Utils::jsonEncode(Utils::jsonDecode($response->getBody(), true, 512, JSON_PRETTY_PRINT));
        } catch (GuzzleException|ClientException $exception) {
            $response = Utils::jsonDecode($exception->getResponse()->getBody());

            throw new RequestFailed($response, sprintf('[Okra - %s] %s', $request->getUrl(), $response->message));
        }
    }

    /**
     * @return GuzzleHttpClient
     */
    public function getHttpClient(): GuzzleHttpClient
    {
        return $this->http;
    }
}
