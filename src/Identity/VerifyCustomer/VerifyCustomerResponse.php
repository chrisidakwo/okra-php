<?php

namespace Okra\Identity\VerifyCustomer;

use JsonException;
use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class VerifyCustomerResponse extends HttpResponse
{
    /**
     * @return Identity
     * @throws JsonException
     */
    public function getCustomerIdentity(): Identity
    {
        $data = $this->getResponse()['data'];

        $identity = new Identity($data);

        if (array_key_exists('receipt', $data)) {
            $identity->metadata = array_merge($identity->metadata ?? [], [
                'receipt' => $data['receipt'],
            ]);
        }

        return $identity;
    }
}
