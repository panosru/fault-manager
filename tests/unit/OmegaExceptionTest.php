<?php
/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:38
 */

use Omega\FaultManager\Exceptions\FaultManagerException;
use PHPUnit\Framework\TestCase;

/**
 * Class OmegaExceptionTest
 * @coversDefaultClass \Omega\FaultManager\Exceptions\FaultManagerException
 */
class OmegaExceptionTest extends TestCase
{
    /**
     * @test
     * @covers ::__construct()
     * @expectedException Omega\FaultManager\Exceptions\FaultManagerException
     * @expectedExceptionMessage exception message
     * @expectedExceptionCode 66001
     */
    public function isThrowable(): void
    {
        throw new FaultManagerException('exception message');
    }
}
