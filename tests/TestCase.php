<?php

namespace Okra\Tests;

use Dotenv\Dotenv;
use Okra\Okra;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Okra $okra;

    protected function setUp(): void
    {
        parent::setUp();

        if (!getenv('OKRA_BASE_URL')) {
            Dotenv::createUnsafeImmutable(dirname(__FILE__, 2))->load();
        }

        $this->okra = new Okra(getenv('OKRA_SECRET_KEY'), getenv('OKRA_BASE_URL'));
    }
}
