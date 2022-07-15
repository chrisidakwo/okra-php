<?php

namespace Okra\Identity\BvnVerify;

use JsonException;
use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class BvnVerifyResponse extends HttpResponse
{
    /**
     * @return array
     * @throws JsonException
     */
    public function getBvnIdentity(): array
    {
        $data = $this->getResponse()['data'];

        $data['identity'] = new Identity($data['identity']);

        return $data;
    }
}
