<?php

namespace Okra\Identity;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Okra\Identity\BvnVerify\BvnVerifyRequest;
use Okra\Identity\BvnVerify\BvnVerifyResponse;
use Okra\Identity\Entities\CompanyVerification;
use Okra\Identity\FetchIdentities\FetchIdentitiesRequest;
use Okra\Identity\FetchIdentities\FetchIdentitiesResponse;
use Okra\Identity\GetIdentityByCustomerDate\GetIdentityByCustomerDateRequest;
use Okra\Identity\GetIdentityByCustomerDate\GetIdentityByCustomerDateResponse;
use Okra\Identity\GetIdentityByCustomerId\GetIdentityByCustomerIdRequest;
use Okra\Identity\GetIdentityByCustomerId\GetIdentityByCustomerIdResponse;
use Okra\Identity\GetIdentityByDate\GetIdentityByDateRequest;
use Okra\Identity\GetIdentityByDate\GetIdentityByDateResponse;
use Okra\Identity\GetIdentityById\GetIdentityByIdRequest;
use Okra\Identity\GetIdentityById\GetIdentityResponse;
use Okra\Identity\NubanVerify\NubanVerifyRequest;
use Okra\Identity\NubanVerify\NubanVerifyResponse;
use Okra\Identity\NubanVerifyName\NubanVerifyNameRequest;
use Okra\Identity\NubanVerifyName\NubanVerifyNameResponse;
use Okra\Identity\RcAndTinVerify\RcAndTinVerifyRequest;
use Okra\Identity\RcAndTinVerify\RcAndTinVerifyResponse;
use Okra\Identity\RcVerify\RcVerifyRequest;
use Okra\Identity\RcVerify\RcVerifyResponse;
use Okra\Identity\TinVerify\TinVerifyRequest;
use Okra\Identity\TinVerify\TinVerifyResponse;
use Okra\Identity\VerifyCustomer\VerifyCustomerRequest;
use Okra\Identity\VerifyCustomer\VerifyCustomerResponse;

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
     * @return array|null
     * @throws GuzzleException|JsonException
     */
    public function fetchIdentities(): ?array
    {
        $response = $this->authenticatedHttpClient->post(new FetchIdentitiesRequest);

        return (new FetchIdentitiesResponse($response))->getResponse();
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

        return (new GetIdentityResponse($response))->getResponse();
    }

    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @param int $limit
     * @param string|null $page
     * @return array
     * @throws GuzzleException|JsonException
     */
    public function getIdentityByDate(string $dateFrom, string $dateTo, int $limit = 10, string $page = null): array
    {
        $response = $this->authenticatedHttpClient->post(
            new GetIdentityByDateRequest($dateFrom, $dateTo, $limit, $page)
        );

        return (new GetIdentityByDateResponse($response))->getResponse();
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

        return (new GetIdentityByCustomerIdResponse($response))->getResponse();
    }

    /**
     * @param string $customerId
     * @param string $startDate
     * @param string $endDate
     * @param int $limit
     * @param string|null $page
     * @return array
     * @throws GuzzleException|JsonException
     */
    public function getIdentityByCustomerDate(string $customerId, string $startDate, string $endDate, int $limit = 10, string $page = null): array
    {
        $response = $this->authenticatedHttpClient->post(
            new GetIdentityByCustomerDateRequest($customerId, $startDate, $endDate, $limit, $page)
        );

        return (new GetIdentityByCustomerDateResponse($response))->getResponse();
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
     *
     * @param string $bvn
     * @return Entities\Identity
     * @throws GuzzleException|JsonException
     */
    public function bvnVerify(string $bvn): Entities\Identity
    {
        $response = $this->authenticatedHttpClient->post(new BvnVerifyRequest($bvn));

        return (new BvnVerifyResponse($response))->getBvnIdentity();
    }

    /**
     * <p><strong>What is NUBAN?</strong><br>
     * NUBAN means Nigerian Uniform Bank Account Number. It is standardized system for numbering bank accounts in Nigeria.</p>
     *
     * <br>
     * <p>This endpoint allows you can identify your users through their NUBAN.</p>
     *
     * <br>
     * <p><strong>NOTE -</strong> This endpoint is only available for Nigerians.</p>
     *
     * @param string $acctNumber
     * @param string $bankId
     * @return Entities\Identity
     * @throws GuzzleException|JsonException
     */
    public function nubanVerify(string $acctNumber, string $bankId): Entities\Identity
    {
        $response = $this->authenticatedHttpClient->post(new NubanVerifyRequest($acctNumber, $bankId));

        return (new NubanVerifyResponse($response))->getNubanIdentity();
    }

    /**
     * <p><strong>What is NUBAN?</strong><br>
     * NUBAN means Nigerian Uniform Bank Account Number. It is standardized system for numbering bank accounts in Nigeria.</p>
     *
     * <br>
     * <p>This endpoint allows you can identify your users through their NUBAN.</p>
     *
     * <br>
     * <p><strong>NOTE -</strong> This endpoint is only available for Nigerians.</p>
     *
     * @param string $acctNumber
     * @param string $bankId
     * @return Entities\Identity It holds on the name fields. Every other field is empty.
     * @throws GuzzleException|JsonException
     */
    public function nubanNameVerify(string $acctNumber, string $bankId): Entities\Identity
    {
        $response = $this->authenticatedHttpClient->post(new NubanVerifyNameRequest($acctNumber, $bankId));

        return (new NubanVerifyNameResponse($response))->getNubanIdentity();
    }

    /**
     * The endpoint is used to retrieve a customer's identity via using the customer ID.
     *
     * @param string $customerId
     * @return Entities\Identity
     * @throws GuzzleException|JsonException
     */
    public function verifyCustomer(string $customerId): Entities\Identity
    {
        $response = $this->authenticatedHttpClient->post(new VerifyCustomerRequest($customerId));

        return (new VerifyCustomerResponse($response))->getCustomerIdentity();
    }

    /**
     * The endpoint is used to retrieve the full details of registered company in Nigeria.
     *
     * <br>
     * <strong>NOTE -</strong> This endpoint is only available for Nigerians.
     *
     * @param string $rcNumber
     * @param string $companyName
     * @return CompanyVerification
     * @throws GuzzleException|JsonException
     */
    public function rcVerify(string $rcNumber, string $companyName): CompanyVerification
    {
        $response = $this->authenticatedHttpClient->post(new RcVerifyRequest($rcNumber, $companyName));

        return (new RcVerifyResponse($response))->getCompanyVerification();
    }

    /**
     * <p>TIN means Tax Identification Number. It is an identification number used for tax purposes.</p>
     *
     * <br>
     * <p>This endpoint allows you fetch your end user's details using the Tax Identification Number of the person.</p>
     *
     * <br>
     * <p><strong>NOTE -</strong> This endpoint is only available for Nigeria companies only.</p>
     *
     * @param string $tinNumber
     * @param string $companyName
     * @return CompanyVerification
     * @throws GuzzleException|JsonException
     */
    public function tinVerify(string $tinNumber, string $companyName): CompanyVerification
    {
        $response = $this->authenticatedHttpClient->post(new TinVerifyRequest($tinNumber, $companyName));

        return (new TinVerifyResponse($response))->getCompanyVerification();
    }

    /**
     * This endpoint allows you retrieve the full details of registered company in Nigeria and their tax information.
     *
     * <br>
     * <strong>NOTE -</strong> This endpoint is only available for Nigerians.
     *
     * @param string $rcNumber
     * @param string $tinNumber
     * @param string $companyName
     * @return CompanyVerification
     * @throws GuzzleException
     * @throws JsonException
     */
    public function rcAndTinVerify(string $rcNumber, string $tinNumber, string $companyName): CompanyVerification
    {
        $response = $this->authenticatedHttpClient->post(new RcAndTinVerifyRequest($rcNumber, $tinNumber, $companyName));

        return (new RcAndTinVerifyResponse($response))->getCompanyVerification();
    }
}
