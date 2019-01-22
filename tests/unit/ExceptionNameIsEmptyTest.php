<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\ExceptionNameIsEmpty;
use PHPUnit\Framework\TestCase;

/**
 * Class ExceptionNameIsEmptyTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
 */
class ExceptionNameIsEmptyTest extends TestCase
{
    /**
     * @test
     * @covers ::getMessage()
     * @covers ::getCode()
     * @expectedException \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @expectedExceptionMessage Exception class must not be empty.
     * @expectedExceptionCode 66002
     */
    public function isThrowable(): void
    {
        throw new ExceptionNameIsEmpty();
    }
}
