<?php

namespace Okra\Bank;

use Okra\Bank\GetBankById\GetBankByIdRequest;
use Okra\Bank\GetBankById\GetBankByIdResponse;
use Okra\Bank\GetListOfBanks\GetListOfBanksRequest;
use Okra\Bank\GetListOfBanks\GetListOfBanksResponse;
use Okra\Exceptions\RequestFailed;

trait Bank
{
    /**
     * This endpoint allows you retrieve the list of all institutions currently supported by Okra.
     *
     * @return Entities\Bank[]|array
     * @throws RequestFailed
     */
    public function getListOfBanks(): array
    {
        $response = $this->anonymousHttpClient->get(new GetListOfBanksRequest());

        return (new GetListOfBanksResponse($response))->getBanks();
    }

    /**
     * Get the details of a specific institution.
     *
     * @param string $bankId
     * @return Entities\Bank
     * @throws RequestFailed
     */
    public function getBankById(string $bankId): Entities\Bank
    {
        $response = $this->authenticatedHttpClient->get(new GetBankByIdRequest($bankId));

        return (new GetBankByIdResponse($response))->getBank();
    }
}
