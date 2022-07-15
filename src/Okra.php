<?php

namespace Okra;

use GuzzleHttp\Client;
use Okra\Exceptions\InvalidBaseUrl;
use Okra\Exceptions\InvalidSecretKey;
use Okra\Http\Client\AnonymousHttpClient;
use Okra\Http\Client\AuthenticatedHttpClient;
use Okra\Identity\Identity;

class Okra
{
    use Identity;

    private AuthenticatedHttpClient $authenticatedHttpClient;
    private AnonymousHttpClient $anonymousHttpClient;

    /**
     * @param string $secretKey
     * @param string $baseUrl
     * @throws InvalidSecretKey|InvalidBaseUrl
     */
    public function __construct(string $secretKey, string $baseUrl)
    {
        $this->assertSecretKeyAndBaseUrlNotEmpty($secretKey, $baseUrl);

        $guzzleClient = new Client(['base_uri' => $baseUrl]);
        $this->anonymousHttpClient = new AnonymousHttpClient($guzzleClient);
        $this->authenticatedHttpClient = new AuthenticatedHttpClient($this->anonymousHttpClient, $secretKey);
    }

    /**
     * @param string $secretKey
     * @param string $baseUrl
     * @throws InvalidSecretKey|InvalidBaseUrl
     */
    private function assertSecretKeyAndBaseUrlNotEmpty(string $secretKey, string $baseUrl): void
    {
        if (empty($secretKey)) {
            throw new InvalidSecretKey('The secret key for Okra cannot be an empty string');
        }

        if (empty($baseUrl)) {
            throw new InvalidBaseUrl('The base URL for Okra cannot be an empty string');
        }
    }
}
