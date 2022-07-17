<?php

namespace Okra\Identity\NubanVerify;

use GuzzleHttp\Exception\InvalidArgumentException;
use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class NubanVerifyResponse extends HttpResponse
{
    /**
     * @return Identity
     * @throws InvalidArgumentException
     */
    public function getNubanIdentity(): Identity
    {
        $data = $this->getResponse()['data'];

        return new Identity($data['identity']);
    }
}
