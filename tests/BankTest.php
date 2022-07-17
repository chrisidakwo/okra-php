<?php

namespace Okra\Tests;

use Okra\Bank\Entities\Bank;
use Okra\Exceptions\RequestFailed;

class BankTest extends TestCase
{
    /**
     * @throws RequestFailed
     */
    public function testItRetrievesAListOfBanks(): void
    {
        $result = $this->okra->getListOfBanks();

        self::assertTrue(count($result) > 20);
        self::assertInstanceOf(Bank::class, $result[0]);
    }

    /**
     * @throws RequestFailed
     */
    public function testItRetriesBankFromId(): void
    {
        $result = $this->okra->getBankById('5d6fe57a4099cc4b210bbeb6');

        self::assertEquals('5d6fe57a4099cc4b210bbeb6', $result->id);
        self::assertEquals('Stanbic IBTC Bank', $result->name);
        self::assertEquals('#00529B', $result->colors->primary);
    }
}
