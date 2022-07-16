<?php

namespace Okra\Identity\NubanVerify;

use JsonException;
use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class NubanVerifyResponse extends HttpResponse
{
    /**
     * @return Identity
     * @throws JsonException
     */
    public function getNubanIdentity(): Identity
    {
        $data = $this->getResponse()['data'];

        return new Identity($data['identity']);
    }
}
