<?php

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

declare(strict_types=1);

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
     */
    public function isThrowable(): void
    {
        $this->expectException(InvalidCompilePath::class);
        $this->expectExceptionMessage('Path "invalid/path" does not exist or is not writable.');
        $this->expectExceptionCode(66004);

        throw new InvalidCompilePath('invalid/path');
    }
}
