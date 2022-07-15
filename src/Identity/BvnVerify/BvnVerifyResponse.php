<?php

namespace Okra\Identity\BvnVerify;

use JsonException;
use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class BvnVerifyResponse extends HttpResponse
{
    /**
     * @return Identity
     * @throws JsonException
     */
    public function getBvnIdentity(): Identity
    {
        $data = $this->getResponse()['data'];

        return new Identity($data['identity']);
    }
}
