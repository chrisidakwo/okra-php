<?php

namespace Okra\Identity\Traits;

use JsonException;
use Okra\Identity\Entities\CompanyVerification;

trait HasCompanyVerificationResponse
{
    /**
     * @return CompanyVerification
     * @throws JsonException
     */
    public function getCompanyVerification(): CompanyVerification
    {
        $response = $this->getResponse();

        return new CompanyVerification($response['data']['details']);
    }
}
