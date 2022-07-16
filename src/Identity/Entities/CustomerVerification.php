<?php

namespace Okra\Identity\Entities;

use Okra\Support\Entities\Owner;
use Okra\Support\Entities\SmileIdentity;

class CustomerVerification extends \Okra\Support\Entities\Entity
{
    /**
     * Data returned by the financial institution about the account owner or owners.
     *
     * @var Owner[]|null $owner
     */
    public ?array $owner;

    /**
     * @var SmileIdentity $smileIdentity
     */
    public SmileIdentity $smileIdentity;

    /**
     * @var bool|null $paystackId
     */
    public ?bool $paystackId;

    /**
     * @var array|null $metadata
     */
    public ?array $metadata;

    /**
     * @var bool|null $merged
     */
    public ?bool $merged;

    /**
     * @var bool|null $fbnFix
     */
    public ?bool $fbnFix;

    /**
     * @var array|null $mergedIds
     */
    public ?array $mergedIds;

    /**
     * @var string[]|null
     */
    public ?array $projects;

    /**
     * @var string|null $verificationCountry
     */
    public ?string $verificationCountry;
}
