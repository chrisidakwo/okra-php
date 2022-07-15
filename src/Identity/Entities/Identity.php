<?php

namespace Okra\Identity\Entities;

use Okra\Support\Entities\Customer;
use Okra\Support\Entities\Entity;
use Okra\Support\Entities\Owner;
use Okra\Support\Entities\Photo;
use Okra\Support\Entities\SmileIdentity;
use stdClass;

class Identity extends Entity
{
    /**
     * Okra's unique identifier used to reference the current user.
     *
     * @var string|null $id
     */
    public ?string $id;

    /**
     * Okra's unique identifier used to reference the current user.
     *
     * @var string|null $_id
     */
    public ?string $_id;

    /**
     * The first name of the account owner.
     *
     * @var string|null $firstname
     */
    public ?string $firstname;

    /**
     * The middlename name of the account owner.
     *
     * @var string|null $middlename
     */
    public ?string $middlename;

    /**
     * The last name of the account owner.
     *
     * @var string|null $lastname
     */
    public ?string $lastname;

    /**
     * The full name of the owner, as provided by the bank.
     *
     * @var string|null $fullname
     */
    public ?string $fullname;

    /**
     * The account owner person's closest living relative(s) as returned from the bank.
     *
     * @var array|null $nextOfKins
     */
    public ?array $nextOfKins;

    /**
     * The date of birth of the account owner, as provided by the bank..
     *
     * @var string|null $dob
     */
    public ?string $dob;

    /**
     * @var bool $verified
     */
    public bool $verified;

    /**
     * Okra's level of confidence that the source is actually an income.
     * We return one of the following enum values: HIGH, MEDIUM.
     *
     * @var string|null $score
     */
    public ?string $score;

    /**
     * @var string|null $dti
     */
    public ?string $dti;

    /**
     * The national identification number of the user.
     *
     * @var string|null $nin
     */
    public ?string $nin;

    /**
     * An identity document used by a citizen of a country to identify their nationality.
     *
     * @var string|null $nationalId
     */
    public ?string $nationalId;

    /**
     * The identification number enabling the user to vote.
     *
     * @var string|null $votersId
     */
    public ?string $votersId;

    /**
     * The Registered Company Number in the account owner company registration, recognised by the law.
     *
     * @var string|null $rcNumber
     */
    public ?string $rcNumber;

    /**
     * The phone number of the user.
     *
     * @var string|string[] $phone
     */
    public $phone;

    /**
     * Data returned by the financial institution about the account owner or owners.
     *
     * @var Owner[]|null $owner
     */
    public ?array $owner;

    /**
     * @var array|null|string $record
     */
    public $record;

    /**
     * @var array $aliases
     */
    public array $aliases;

    /**
     * @var string $env
     */
    public string $env;

    /**
     * The bank verification number of the user.
     *
     * @var string|null $bvn
     */
    public ?string $bvn;

    /**
     * @var bool|null $bvnUpdated
     */
    public ?bool $bvnUpdated;

    /**
     * @var string[]|null $refIds
     */
    public ?array $refIds;

    /**
     * This is the source of the income stream as identified by the Named Entity Recognition system (NER)
     * which is part of the Okra NLU system.
     *
     * @var string[]|null $employer
     */
    public ?array $employer;

    /**
     * The marital status of the account owner.
     *
     * @var string|null $maritalStatus
     */
    public ?string $maritalStatus;

    /**
     * @var Customer|string|null $customer
     */
    public $customer;

    /**
     * The account owner's registered email address.
     *
     * @var string|string[] $email
     */
    public $email;

    /**
     * The gender of the account owner.
     *
     * @var string|null $gender
     */
    public ?string $gender;

    /**
     * @var string|null $mothersMaiden
     */
    public ?string $mothersMaiden;

    /**
     * The passport photograph of the user as it in the bvn data.
     *
     * @var string|Photo[] $photoId
     */
    public $photoId;

    /**
     * @var bool|null $smileId;
     */
    public ?bool $smileId;

    /**
     * @var SmileIdentity|stdClass|null $smileIdentity
     */
    public $smileIdentity;

    /**
     * @var bool|null $paystackId
     */
    public ?bool $paystackId;

    /**
     * @var string|null $levelOfAccount
     */
    public ?string $levelOfAccount;

    /**
     * The local government area origin of the account owner.
     *
     * @var string|null $lgaOfOrigin
     */
    public ?string $lgaOfOrigin;

    /**
     * The local government area residence of the account owner.
     *
     * @var string|null $lgaOfResidence
     */
    public ?string $lgaOfResidence;

    /**
     * The country the account owner has a lawful citizenship.
     *
     * @var string|null $nationality
     */
    public ?string $nationality;

    /**
     * The country's state origin of the account owner.
     *
     * @var string|null $stateOfOrigin
     */
    public ?string $stateOfOrigin;

    /**
     * The state the account owner resides.
     *
     * @var string|null $stateOfResidence
     */
    public ?string $stateOfResidence;

    /**
     * The accounts owners registered address.
     *
     * @var string[] $address
     */
    public array $address;

    /**
     * @var int|null $__v
     */
    public ?int $__v;

    /**
     * @var string|null $watchListed
     */
    public ?string $watchListed;

    /**
     * @var string|null $status
     */
    public ?string $status;

    /**
     * The ISO-8601 timestamp of when the data point was created in Okra's database.
     *
     * @var string|null $createdAt
     */
    public ?string $createdAt;

    /**
     * The ISO-8601 timestamp of when the data point was last updated in Okra's database.
     *
     * @var string $lastUpdated
     */
    public string $lastUpdated;

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
