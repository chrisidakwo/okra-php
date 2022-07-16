<?php

namespace Okra\Identity\Traits;

use JsonException;
use Okra\Exceptions\RequestFailed;
use Okra\Identity\Entities\Identity;
use Okra\Support\Entities\Pagination;

trait HasIdentityResponse
{
    /**
     * @return array|null
     * @throws JsonException
     */
    public function getIdentities(): ?array
    {
        $response = $this->getResponse();

        return $response['identities'];
    }

    /**
     * @return Identity
     * @throws JsonException
     */
    public function getIdentity(): Identity
    {
        $response = $this->getResponse();

        return $response['identity'][0];
    }

    /**
     * Return original response array with identity data mapped to the Identity entity.
     *
     * @return array
     * @throws JsonException|RequestFailed
     */
    public function getResponse(): array
    {
        /** @noinspection PhpMultipleClassDeclarationsInspection */
        $response = parent::getResponse();

        if (array_key_exists('pagination', $response['data']) && false === empty($response['data']['pagination'])) {
            $response['data']['pagination'] = new Pagination($response['data']['pagination']);
        }

        $identityKeyName = 'identity';
        if (array_key_exists('identities', $response['data'])) {
            $identityKeyName = 'identities';
        }

        $identity = $response['data'][$identityKeyName];

        if (is_array($identity)) {
            $response['data'][$identityKeyName] = array_map(function ($value) {
                new Identity($value);
            }, $identity);
        }

        return $response['data'];
    }

}
