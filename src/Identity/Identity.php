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
     * <p>The endpoint allows you retrieve various account holder information on file with the bank, including names,
     * emails, phone numbers, and addresses.</p>
     *
     * <br>
     * <p><strong>Note:</strong> This request may take some time to complete if identity was not specified as an
     * initial product when creating the Record. This is because Okra must communicate directly with the institution
     * to retrieve the data.</p>
     *
     * @return array
     * @throws GuzzleException|JsonException
     */
    public function fetchIdentities(): array
    {
        $response = $this->authenticatedHttpClient->post(new FetchIdentitiesRequest);

        return (new FetchIdentitiesResponse($response))->getIdentities();
    }

    /**
     * This endpoint allows you retrieve various account holder information on file with the financial institution,
     * including names, emails, phone numbers, and addresses etc., by passing the id params.
     *
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
     * This endpoint allows you retrieve various account holder information on file with the financial institution,
     * including names, emails, phone numbers, and addresses etc., by passing the `customer id`.
     *
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
     * <p>BVN means Bank Verification Number.<br>
     * It is a unique identity given to users that can be verified across the Nigerian Banking Industry.</p>
     *
     * <br>
     * <p>This endpoint allows you Lookup BVN and get detailed information on the BVN Identity.</p>
     *
     * <br>
     * <p><strong>NOTE -</strong> This endpoint is only available for Nigerians.</p>
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
