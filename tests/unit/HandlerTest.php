<?php
/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:29
 */

use Omega\FaultManager\Fault;
use PHPUnit\Framework\TestCase;

/**
 * Class HandlerTest
 * @coversDefaultClass \Omega\FaultManager\Fault
 */
class HandlerTest extends TestCase
{

    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    /**
     * @test
     * @covers ::__construct()
     */
    public function checkThatConstructorIsPrivate(): void
    {
        $constructor = (new \ReflectionClass(Fault::class))->getConstructor();

        self::assertTrue($constructor->isPrivate());
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage bad method call
     */
    public function throwsExceptionThatIsAlreadyDefined(): void
    {
        Fault::throw(\BadMethodCallException::class, 'bad method call');
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \MyCustomException
     * @expectedExceptionMessage custom exception message
     * @expectedExceptionCode 666
     */
    public function throwsCustomException(): void
    {
        Fault::throw('MyCustomException', 'custom exception message', 666);
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \Omega\FaultManager\Exceptions\EmptyErrorNameException
     */
    public function ifNoExceptionNameIsGiven(): void
    {
        Fault::throw('');
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \Omega\FaultManager\Exceptions\IncompatibleErrorNameException
     */
    public function ifIncompatibleNameIsGiven(): void
    {
        Fault::throw('IncompatibleClass');
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \Omega\FaultManager\Exceptions\OmegaException
     * @expectedExceptionMessage Class 'EverythingGoneWrongMockedClass' could not be instantiated.
     */
    public function ifEverythingGoneWrong(): void
    {
        \Mockery::namedMock('EverythingGoneWrongMockedClass');
        Fault::throw('EverythingGoneWrongMockedClass');
    }
}
