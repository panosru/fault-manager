<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\NamespacedErrorException;
use PHPUnit\Framework\TestCase;

/**
 * Class NamespacedErrorExceptionTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\NamespacedErrorException
 */
class NamespacedErrorExceptionTest extends TestCase
{
    /**
     * @test
     * @covers ::getMessage()
     * @covers ::getCode()
     * @expectedException \Omega\FaultManager\Exceptions\NamespacedErrorException
     * @expectedExceptionMessage Namespaces custom exceptions are not supported (yet).
     * @expectedExceptionCode 66005
     */
    public function isThrowable(): void
    {
        throw new NamespacedErrorException();
    }
}
