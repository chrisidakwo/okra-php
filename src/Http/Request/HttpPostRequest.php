<?php

namespace Okra\Http\Request;

use GuzzleHttp\Utils;
use Okra\Http\Request\Contracts\HttpPostRequest as HttpPostRequestContract;

abstract class HttpPostRequest implements HttpPostRequestContract
{
    /**
     * Request URL.
     *
     * @var string $url
     */
    public string $url;

    /**
     * Request data.
     *
     * @var array|null $data
     */
    protected ?array $data;

    /**
     * Request headers.
     *
     * @var array $headers
     */
    protected array $headers = [];

    /**
     * @param string $url
     * @param array $data
     */
    public function __construct(string $url, array $data = [])
    {
        $this->url = $url;

        $this->setBody($data);
    }

    /**
     * @inheritDoc
     */
    public function setBody(array $data = []): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Returns the URL for the POST request.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @inheritDoc
     */
    public function getBody(): string
    {
        if (empty($this->data)) {
            return '';
        }

        return Utils::jsonEncode($this->data, JSON_THROW_ON_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
