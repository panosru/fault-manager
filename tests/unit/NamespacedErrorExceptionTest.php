<?php

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

declare(strict_types=1);

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
     */
    public function isThrowable(): void
    {
        $this->expectException(NamespaceError::class);
        $this->expectExceptionMessage('Namespaces in custom exceptions are not supported (yet).');
        $this->expectExceptionCode(66005);

        throw new NamespaceError();
    }
}
