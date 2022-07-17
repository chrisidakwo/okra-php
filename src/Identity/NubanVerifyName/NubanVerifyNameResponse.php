<?php

namespace Okra\Identity\NubanVerifyName;

use GuzzleHttp\Exception\InvalidArgumentException;
use Okra\Exceptions\RequestFailed;
use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class NubanVerifyNameResponse extends HttpResponse
{
    /**
     * @return Identity
     * @throws RequestFailed|InvalidArgumentException
     */
    public function getNubanIdentity(): Identity
    {
        $data = $this->getResponse()['data'];

        return new Identity($data['identity']);
    }
}
