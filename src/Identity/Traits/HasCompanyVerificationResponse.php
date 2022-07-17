<?php

namespace Okra\Identity\Traits;

use GuzzleHttp\Exception\InvalidArgumentException;
use Okra\Exceptions\RequestFailed;
use Okra\Identity\Entities\CompanyVerification;

trait HasCompanyVerificationResponse
{
    /**
     * @return CompanyVerification
     * @throws RequestFailed|InvalidArgumentException
     */
    public function getCompanyVerification(): CompanyVerification
    {
        $response = $this->getResponse();

        return new CompanyVerification($response['data']['details']);
    }
}
