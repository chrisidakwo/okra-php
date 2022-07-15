<?php

namespace Okra\Support\Entities;

class Customer extends Entity
{
    /**
     * Okra's unique identifier used to reference the customer.
     *
     * @var string $_id
     */
    public string $_id;

    /**
     * The full name of the customer.
     *
     * @var string $name
     */
    public string $name;
}
