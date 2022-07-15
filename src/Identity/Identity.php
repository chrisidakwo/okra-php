<?php

namespace Okra\Identity;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Okra\Identity\BvnVerify\BvnVerifyRequest;
use Okra\Identity\BvnVerify\BvnVerifyResponse;
use Okra\Identity\FetchIdentities\FetchIdentitiesRequest;
use Okra\Identity\FetchIdentities\FetchIdentitiesResponse;
use Okra\Identity\GetIdentityByCustomerId\GetIdentityByCustomerIdRequest;
use Okra\Identity\GetIdentityByCustomerId\GetIdentityByCustomerIdResponse;
use Okra\Identity\GetIdentityById\GetIdentityByIdRequest;
use Okra\Identity\GetIdentityById\GetIdentityResponse;

trait Identity
{
    /**
     * @return array
     * @throws GuzzleException|JsonException
     */
    public function fetchIdentities(): array
    {
        $response = $this->authenticatedHttpClient->post(new FetchIdentitiesRequest);

        return (new FetchIdentitiesResponse($response))->getIdentities();
    }

    /**
     * @param string $id
     * @param int $limit
     * @param string|null $page
     * @return array
     * @throws GuzzleException|JsonException
     */
    public function getIdentityById(string $id, int $limit = 10, string $page = null): array
    {
        $response = $this->authenticatedHttpClient->post(new GetIdentityByIdRequest($id, $limit, $page));

        return (new GetIdentityResponse($response))->getIdentity();
    }

    /**
     * @param string $customerId
     * @param int $limit
     * @param string|null $page
     * @return array
     * @throws GuzzleException|JsonException
     */
    public function getIdentityByCustomer(string $customerId, int $limit = 10, string $page = null): array
    {
        $response = $this->authenticatedHttpClient->post(
            new GetIdentityByCustomerIdRequest($customerId, $limit, $page)
        );

        return (new GetIdentityByCustomerIdResponse($response))->getIdentity();
    }

    /**
     * @param string $bvn
     * @return array
     * @throws GuzzleException|JsonException
     */
    public function bvnVerify(string $bvn): array
    {
        $response = $this->authenticatedHttpClient->post(new BvnVerifyRequest($bvn));

        return (new BvnVerifyResponse($response))->getBvnIdentity();
    }
}
