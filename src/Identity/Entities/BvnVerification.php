<?php

namespace Okra\Identity\Entities;

use Okra\Support\Entities\Entity;
use Okra\Support\Entities\Photo;

class BvnVerification extends Entity
{
    /**
     * Okra's unique identifier used to reference the current user.
     *
     * @var string $id
     */
    public string $id;

    /**
     * The bank verification number of the user.
     *
     * @var string $bvn
     */
    public string $bvn;

    /**
     * The first name of the account owner.
     *
     * @var string $firstname
     */
    public string $firstname;

    /**
     * The middle name of the account owner.
     *
     * @var string $middlename
     */
    public string $middlename;

    /**
     * The last name of the account owner.
     *
     * @var string $lastname
     */
    public string $lastname;

    /**
     * The fullname of the user.
     *
     * @var string $fullname
     */
    public string $fullname;

    /**
     * The assumed identity of the user.
     *
     * @var string[] $aliases
     */
    public array $aliases;

    /**
     * The phone number of the user.
     *
     * @var string $phone
     */
    public string $phone;

    /**
     * The email address of the user.
     *
     * @var string $email
     */
    public string $email;

    /**
     * The date of birth of the account owner, as provided by the bank.
     *
     * @var string $dob
     */
    public string $dob;

    /**
     * The gender of the account owner.
     *
     * @var string $gender
     */
    public string $gender;

    /**
     * The residential address of the user.
     *
     * @var string[] $address
     */
    public array $address;

    /**
     * The passport photograph of the user as it in the bvn data
     *
     * @var Photo[] $photoId
     */
    public array $photoId;

    /**
     * Okra's level of confidence that the source is actually an income.
     * We return one of the following enum values: HIGH, MEDIUM.
     *
     * @var string $score
     */
    public string $score;

    /**
     * @var string $env
     */
    public string $env;

    /**
     * The ISO-8601 timestamp of when the data point was last updated in Okra's database.
     *
     * @var string $createdAt
     */
    public string $createdAt;

    /**
     * The ISO-8601 timestamp of when the data point was last updated in Okra's database.
     *
     * @var string $lastUpdated
     */
    public string $lastUpdated;
}
