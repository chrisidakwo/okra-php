<?php

namespace Okra\Identity\BvnVerify;

use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class BvnVerifyResponse extends HttpResponse
{
    /**
     * @return Identity
     */
    public function getBvnIdentity(): Identity
    {
        $data = $this->getResponse()['data'];

        return new Identity($data['identity']);
    }
}
