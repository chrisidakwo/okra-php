<?php

namespace Okra\Http\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Okra\Exceptions\RequestFailed;
use Okra\Http\Request\Contracts\HttpGetRequest;
use Okra\Http\Request\Contracts\HttpPostRequest;

class AuthenticatedHttpClient implements HttpClient
{
    /**
     * Base http client without authentication.
     */
    private AnonymousHttpClient $http;

    /**
     * Secret key provided by Okra. Used to initialize http client headers.
     *
     * @var string $token
     */
    private string $token;

    /**
     * Additional request headers.
     *
     * @var array $headers
     */
    protected array $headers;

    /**
     * @param AnonymousHttpClient $anonymousHttpClient
     * @param string $token
     * @param array $headers
     */
    public function __construct(AnonymousHttpClient $anonymousHttpClient, string $token, array $headers = [])
    {
        $this->http = $anonymousHttpClient;
        $this->token = $token;
        $this->headers = $headers;
    }

    /**
     * @inheritDoc
     */
    public function post(HttpPostRequest $request): string
    {
        $requestBody = $request->getBody();
        $headers = $this->getHeaders($request->getHeaders());

        if ($requestBody === '') {
            $options = ['headers' => $headers];
        } else {
            $options = ['body' => $requestBody, 'headers' => $headers];
        }

        try {
            $response = $this->http->getHttpClient()->post($request->getUrl(), $options);

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
        $headers = $this->getHeaders($request->getHeaders());

        try {
            $response = $this->http->getHttpClient()->get($request->getUrl(), [
                'headers' => $headers
            ]);

            return Utils::jsonEncode(Utils::jsonDecode($response->getBody(), true, 512, JSON_PRETTY_PRINT));
        } catch (GuzzleException|ClientException $exception) {
            $response = Utils::jsonDecode($exception->getResponse()->getBody());

            throw new RequestFailed($response, sprintf('[Okra - %s] %s', $request->getUrl(), $response->message));
        }
    }

    /**
     * Get headers for authenticated requests.
     *
     * @return array|string[]
     */
    private function getHeaders(array $headers = []): array
    {
        return array_merge([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $this->token"
        ], $headers);
    }
}
