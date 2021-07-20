<?php

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

declare(strict_types=1);

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\BaseError;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseErrorTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\BaseError
 */
class BaseErrorTest extends TestCase
{
    /**
     * @test
     * @covers ::__construct()
     */
    final public function isThrowable(): void
    {
        $this->expectException(BaseError::class);
        $this->expectExceptionMessage("exception message");
        $this->expectExceptionCode(66001);

        throw new BaseError('exception message');
    }
}
