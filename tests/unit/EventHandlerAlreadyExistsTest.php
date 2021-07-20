<?php

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

declare(strict_types=1);

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
     */
    public function isThrowable(): void
    {
        $this->expectException(EventHandlerAlreadyExists::class);
        $this->expectExceptionMessage('A handler for "Exception" already exists.');
        $this->expectExceptionCode(66006);

        throw new EventHandlerAlreadyExists(\Exception::class);
    }
}
