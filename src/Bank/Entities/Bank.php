<?php

namespace Okra\Bank\Entities;

use Okra\Support\Entities\Color;
use Okra\Support\Entities\Entity;
use stdClass;

class Bank extends Entity
{
    /**
     * @var string $id
     */
    public string $id;

    /**
     * @var string $name
     */
    public string $name;

    /**
     * @var string $slug
     */
    public string $slug;

    /**
     * @var string|null $icon
     */
    public ?string $icon;

    /**
     * @var string $v2Icon
     */
    public string $v2Icon;

    /**
     * @var string $v2Logo
     */
    public string $v2Logo;

    /**
     * @var array $products
     */
    public array $products;

    /**
     * @var object|stdClass|Color
     */
    public object $colors;

    /**
     * @var bool $secretQuestionOrOtp
     */
    public bool $secretQuestionOrOtp;

    /**
     * @var bool $secretQuestionOrOtpMobile
     */
    public bool $secretQuestionOrOtpMobile;

    /**
     * @var bool $secretQuestionOrOtpCorp
     */
    public bool $secretQuestionOrOtpCorp;

    /**
     * @var object|stdClass $payments
     */
    public object $payments;

    /**
     * @var bool $ussd
     */
    public bool $ussd;

    /**
     * @var array $countries
     */
    public array $countries;

    /**
     * @var bool|null $corporate
     */
    public ?bool $corporate;

    /**
     * @var string|null $status
     */
    public ?string $status;

    /**
     * @var bool $individual
     */
    public bool $individual;

    /**
     * @var string $sortcode
     */
    public string $sortcode;

    /**
     * @var string|null $altSortcode
     */
    public ?string $altSortcode;

    /**
     * @var string $createdAt
     */
    public string $createdAt;

    /**
     * @var string $lastUpdated
     */
    public string $lastUpdated;
}
