<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\InvalidCompilePath;
use PHPUnit\Framework\TestCase;

/**
 * Class InvalidCompilePathTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\InvalidCompilePath
 */
class InvalidCompilePathTest extends TestCase
{
    /**
     * @test
     * @covers ::__construct()
     * @expectedException \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @expectedExceptionMessage Path "invalid/path" does not exist or is not writable.
     * @expectedExceptionCode 66004
     */
    public function isThrowable(): void
    {
        throw new InvalidCompilePath('invalid/path');
    }
}
