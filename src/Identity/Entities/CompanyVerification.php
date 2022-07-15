<?php

namespace Okra\Identity\Entities;

use Okra\Support\Entities\Entity;

class CompanyVerification extends Entity
{
    /**
     * The RC number of the company.
     *
     * @var string $rcNo
     */
    public string $rcNo;

    /**
     * The registered company name.
     *
     * @var string $companyName
     */
    public string $companyName;

    /**
     * The company address.
     *
     * @var string $address
     */
    public string $address;

    /**
     * The date the company was registered.
     *
     * @var string $dateReg
     */
    public string $dateReg;
}
