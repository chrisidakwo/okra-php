<?php

namespace Okra\Exceptions;

use RuntimeException;
use Throwable;

class RequestFailed extends RuntimeException
{
    /**
     * @var mixed $response
     */
    protected $response;

    /**
     * @param mixed $response
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($response, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }
}
