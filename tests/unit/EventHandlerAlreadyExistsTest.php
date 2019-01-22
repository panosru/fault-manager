<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Exceptions\EventHandlerAlreadyExists;
use PHPUnit\Framework\TestCase;

/**
 * Class EventHandlerAlreadyExistsTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\EventHandlerAlreadyExists
 */
class EventHandlerAlreadyExistsTest extends TestCase
{
    /**
     * @test
     * @covers ::__construct()
     * @expectedException \Omega\FaultManager\Exceptions\EventHandlerAlreadyExists
     * @expectedExceptionMessage A handler for "Exception" already exists.
     * @expectedExceptionCode 66006
     */
    public function isThrowable(): void
    {
        throw new EventHandlerAlreadyExists(\Exception::class);
    }
}
