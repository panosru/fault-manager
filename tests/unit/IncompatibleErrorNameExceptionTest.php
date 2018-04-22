<?php
/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

use Omega\FaultManager\Exceptions\IncompatibleErrorNameException;
use PHPUnit\Framework\TestCase;

/**
 * Class IncompatibleErrorNameExceptionTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\IncompatibleErrorNameException
 */
class IncompatibleErrorNameExceptionTest extends TestCase
{
    /**
     * @test
     * @covers ::__construct()
     * @expectedException \Omega\FaultManager\Exceptions\IncompatibleErrorNameException
     * @expectedExceptionMessage Exception class must end with "Exception". Given name was: "testClass".
     * @expectedExceptionCode 66003
     */
    public function isThrowable(): void
    {
        throw new IncompatibleErrorNameException('testClass');
    }
}
