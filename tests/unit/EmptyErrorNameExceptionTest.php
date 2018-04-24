<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\EmptyErrorNameException;
use PHPUnit\Framework\TestCase;

/**
 * Class EmptyErrorNameExceptionTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\EmptyErrorNameException
 */
class EmptyErrorNameExceptionTest extends TestCase
{
    /**
     * @test
     * @covers ::getMessage()
     * @covers ::getCode()
     * @expectedException \Omega\FaultManager\Exceptions\EmptyErrorNameException
     * @expectedExceptionMessage Exception class must not be empty.
     * @expectedExceptionCode 66002
     */
    public function isThrowable(): void
    {
        throw new EmptyErrorNameException();
    }
}
