<?php

namespace Okra\Identity\FetchIdentities;

use JsonException;
use Okra\Exceptions\RequestFailed;
use Okra\Http\Response\HttpResponse;
use Okra\Identity\Entities\Identity;

class FetchIdentitiesResponse extends HttpResponse
{
    /**
     * @return array
     * @throws JsonException|RequestFailed
     */
    public function getIdentities(): array
    {
        $response = $this->getResponse();

        $identities = $response['data']['identities'];

        if (is_array($identities)) {
            $response['data']['identities'] = array_map(function ($identity) {
                return new Identity($identity);
            }, $identities);
        }

        return $response['data'];
    }
}
