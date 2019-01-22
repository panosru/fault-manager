<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\NamespaceError;
use PHPUnit\Framework\TestCase;

/**
 * Class NamespacedErrorExceptionTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\NamespaceError
 */
class NamespacedErrorExceptionTest extends TestCase
{
    /**
     * @test
     * @covers ::getMessage()
     * @covers ::getCode()
     * @expectedException \Omega\FaultManager\Exceptions\NamespaceError
     * @expectedExceptionMessage Namespaces in custom exceptions are not supported (yet).
     * @expectedExceptionCode 66005
     */
    public function isThrowable(): void
    {
        throw new NamespaceError();
    }
}
