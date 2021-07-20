<?php

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

declare(strict_types=1);

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
     */
    public function isThrowable(): void
    {
        $this->expectException(ExceptionNameIsEmpty::class);
        $this->expectExceptionMessage('Exception class must not be empty.');
        $this->expectExceptionCode(66002);

        throw new ExceptionNameIsEmpty();
    }
}
