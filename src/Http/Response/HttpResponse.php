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
            throw new RequestFailed(
                $response,
                '[Okra] Received an error response. Ensure that the credentials are right and request data is properly formed.',
                400,
            );
        }

        return $response;
    }
}
