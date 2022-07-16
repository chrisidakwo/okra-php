<?php

namespace Okra\Http\Response;

use GuzzleHttp\Utils;
use Okra\Exceptions\RequestFailed;
use Okra\Http\Response\Contracts\HttpResponse as HttpResponseContract;

class HttpResponse implements HttpResponseContract
{
    private string $response;

    /**
     * @param string $response
     */
    public function __construct(string $response)
    {
        $this->response = $response;
    }

    /**
     * @inheritDoc
     */
    public function getResponse(): array
    {
        $response = (array) Utils::jsonDecode($this->response, true, 512, JSON_THROW_ON_ERROR);

        if ($response['status'] === 'error') {
            $errorMessage = 'Ensure that the credentials are right and request data is properly formed.';

            if (array_key_exists('message', $response)) {
                $errorMessage = $response['message'];
            } elseif (array_key_exists('data', $response)) {
                if (count($response['data']['message'])) {
                    $errorMessage = implode(' | ', $response['data']['message']);
                } elseif (array_key_exists('method', $response['data']) && false === empty($response['data']['method'])) {
                    $method = $response['data']['method'];

                    $errorMessage = "Error: $method";
                }
            }

            throw new RequestFailed(
                $response,
                "[Okra] Received an error response. $errorMessage",
                400,
            );
        }

        return $response;
    }
}
