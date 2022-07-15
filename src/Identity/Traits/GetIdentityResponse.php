<?php

namespace Okra\Identity\Traits;

use JsonException;
use Okra\Identity\Entities\Identity;

trait GetIdentityResponse
{
    /**
     * Return original response array with identity data mapped to the Identity entity.
     *
     * @return array
     * @throws JsonException
     */
    public function getIdentity(): array
    {
        $response = $this->getResponse();

        $identity = $response['data']['identity'];

        if (is_array($identity)) {
            $response['data']['identity'] = array_map(function ($value) {
                new Identity($value);
            }, $identity);
        }

        return $response['data'];
    }

}
