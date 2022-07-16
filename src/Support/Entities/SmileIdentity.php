<?php

namespace Okra\Support\Entities;

class SmileIdentity extends Entity
{
    /**
     * @var string|null $jobId
     */
    public ?string $jobId;

    /**
     * @var string|null $resultCode
     */
    public ?string $resultCode;

    /**
     * @var string|null $message
     */
    public ?string $message;

    /**
     * @var string $updatedFrom
     */
    public string $updatedFrom;

    /**
     * @var string $updatedAt
     */
    public string $updatedAt;
}
