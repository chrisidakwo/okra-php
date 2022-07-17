<?php

namespace Okra\Tests;

use Okra\Exceptions\RequestFailed;
use Okra\Identity\Entities\CompanyVerification;
use Okra\Identity\Entities\Identity;
use stdClass;

class IdentityTest extends TestCase
{
    /**
     * @throws RequestFailed
     */
    public function testItCanFetchIdentities(): void
    {
        $result = $this->okra->fetchIdentities();

        self::assertContains('identities', array_keys($result));
        self::assertContains('pagination', array_keys($result));
    }

    /**
     * @throws RequestFailed
     */
    public function testItCanGetIdentityByTheId(): void
    {
        $this->expectException(RequestFailed::class);

        // TODO: Get a better ID
        $this->okra->getIdentityById('2343434', 3);
    }

    /**
     * @throws RequestFailed
     */
    public function testItVerifiesBvn(): void
    {
        $result = $this->okra->bvnVerify('29089019024');

        self::assertInstanceOf(Identity::class, $result);
        self::assertEquals('29089019024', $result->bvn);
        self::assertIsArray($result->phone);
        self::assertIsArray($result->photoId);
        self::assertInstanceOf(stdClass::class, $result->customer);
    }

    /**
     * @throws RequestFailed
     */
    public function testItCanGetIdentityByDateRange(): void
    {
        $result = $this->okra->getIdentityByDate('2022-05-01', date('Y-m-d'));

        self::assertContains('identity', array_keys($result));
        self::assertContains('pagination', array_keys($result));
    }

    public function testItCanRetrieveAnIdentityFromCustomerIdWIthDateRange(): void
    {
        $result = $this->okra->getIdentityByCustomerDate('62cef9fd4aee0d620d5fea62', '2022-05-01', date('Y-m-d'));

        self::assertContains('identity', array_keys($result));
        self::assertContains('pagination', array_keys($result));
    }

    /**
     * @throws RequestFailed
     */
    public function testItCanVerifyCustomer(): void
    {
        $result = $this->okra->verifyCustomer('62cef9fd4aee0d620d5fea62');

        self::assertInstanceOf(Identity::class, $result);
        self::assertNotEmpty($result->_id);
        self::assertIsArray($result->phone);
        self::assertIsArray($result->photoId);
    }

    /**
     * @throws RequestFailed
     */
    public function testItCanVerifyACompanyWithRCNumber(): void
    {
        $result = $this->okra->rcVerify('1812189', 'Crineon Limited');

        self::assertInstanceOf(CompanyVerification::class, $result);
        self::assertEquals('1812189', $result->rcNo);
        self::assertEqualsIgnoringCase('Crineon Limited', $result->companyName);
        self::assertNotEmpty($result->address);
        self::assertStringContainsString('2021-06-28', $result->dateReg);
    }

    /**
     * @throws RequestFailed
     */
    public function testCompanyCanBeVerifiedWithRcNumberAndTinNumber(): void
    {
        $this->expectException(RequestFailed::class);

        // TODO: Get a better TIN
        $this->okra->rcAndTinVerify('1812189',  '23955983-0001','Crineon Limited');
    }

    /**
     * @throws RequestFailed
     */
    public function testItHandlesIncorrectTin(): void
    {
        $this->expectException(RequestFailed::class);
        $this->expectExceptionMessage('[Okra] Received an error response. Company TIN not verified');

        $this->okra->tinVerify('23955983-0001','Crineon Limited');
    }

    /**
     * @throws RequestFailed
     */
    public function testItVerifiesNuban(): void
    {
        $identity = $this->okra->nubanVerify('2209019028', '5d6fe57a4099cc4b210bbec2');

        self::assertTrue($identity->verified);
        self::assertNotEmpty($identity->bvn);
        self::assertEquals('Nigeria', $identity->nationality);
        self::assertEquals('NG', $identity->verificationCountry);
    }

    /**
     * @throws RequestFailed
     */
    public function testItVerifiesNubanAndReturnsOnlyNameProperties(): void
    {
        $identity = $this->okra->nubanNameVerify('2209019028', '5d6fe57a4099cc4b210bbec2');

        self::assertNotEmpty($identity->firstname);
        self::assertNotEmpty($identity->middlename);
        self::assertNotEmpty($identity->lastname);
        self::assertNotEmpty($identity->fullname);
    }
}
