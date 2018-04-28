<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\EventHandlerExistsException;
use PHPUnit\Framework\TestCase;

/**
 * Class EventHandlerExistsExceptionTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\EventHandlerExistsException
 */
class EventHandlerExistsExceptionTest extends TestCase
{
    /**
     * @test
     * @covers ::__construct()
     * @expectedException \Omega\FaultManager\Exceptions\EventHandlerExistsException
     * @expectedExceptionMessage A handler for "Exception" already exists.
     * @expectedExceptionCode 66006
     */
    public function isThrowable(): void
    {
        throw new EventHandlerExistsException(\Exception::class);
    }
}
