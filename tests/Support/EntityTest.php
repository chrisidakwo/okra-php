<?php

namespace Okra\Tests\Support;

use Okra\Support\Entities\Entity;
use Okra\Tests\TestCase;

class EntityTest extends TestCase
{
    public function testEntityIsWellFormedAndCanBeConvertedToArray(): void
    {
        $data = [
            'id' => 3434535,
            'amount' => 345400,
            'text' => 'ertyew43t32424',
            'customer' => [
                'name' => 'Chris',
                'phone' => '1234',
                'address' => [
                    'city' => ['Garki'],
                    'state' => 'Abuja',
                ]
            ],
        ];

        // Initiate new class
        $class = new Record($data);

        self::assertEquals(['Garki'], $class->customer->address->city);

        $isArray = is_array($class->toArray());
        self::assertTrue($isArray);

        $isArray = is_array($class->toArray()['customer']);
        self::assertTrue($isArray);

        self::assertArrayHasKey('name', $class->toArray()['customer']);
        self::assertArrayHasKey('phone', $class->toArray()['customer']);
    }
}


class Record extends Entity
{
    public string $id;
    public float $amount;
    public string $text;
    public object $customer;
}
