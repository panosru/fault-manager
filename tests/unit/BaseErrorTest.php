<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

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
     * @expectedException \Omega\FaultManager\Exceptions\BaseError
     * @expectedExceptionMessage exception message
     * @expectedExceptionCode 66001
     */
    public function isThrowable(): void
    {
        throw new BaseError('exception message');
    }
}
