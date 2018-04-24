<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\InvalidCompilePathException;
use PHPUnit\Framework\TestCase;

/**
 * Class InvalidCompilePathExceptionTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\InvalidCompilePathException
 */
class InvalidCompilePathExceptionTest extends TestCase
{
    /**
     * @test
     * @covers ::__construct()
     * @expectedException \Omega\FaultManager\Exceptions\InvalidCompilePathException
     * @expectedExceptionMessage Path "invalid/path" does not exist or is not writable.
     * @expectedExceptionCode 66004
     */
    public function isThrowable(): void
    {
        throw new InvalidCompilePathException('invalid/path');
    }
}
