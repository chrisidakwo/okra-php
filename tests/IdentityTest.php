<?php

namespace Okra\Tests;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Okra\Exceptions\RequestFailed;
use Okra\Identity\Entities\Identity;
use stdClass;

class IdentityTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function testItCanFetchIdentities(): void
    {
        $result = $this->okra->fetchIdentities();

        self::assertContains('identities', array_keys($result));
        self::assertContains('total', array_keys($result));
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function testItCanGetIdentityByTheId(): void
    {
        $this->expectException(RequestFailed::class);

        $this->okra->getIdentityById('2343434', 3);

        $this->markTestSkipped();
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function testItVerifiesBvn(): void
    {
        $result = $this->okra->bvnVerify('29089019024');

        self::assertInstanceOf(Identity::class, $result['identity']);
        self::assertEquals('29089019024', $result['identity']->bvn);
        self::assertIsArray($result['identity']->phone);
        self::assertIsArray($result['identity']->photoId);
        self::assertInstanceOf(stdClass::class, $result['identity']->customer);
    }


}
