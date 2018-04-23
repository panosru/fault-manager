<?php
/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:29
 */

use Omega\FaultManager\Fault;
use PHPUnit\Framework\TestCase;

/**
 * Class FaultTest
 * @coversDefaultClass \Omega\FaultManager\Fault
 */
class FaultTest extends TestCase
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
     * @expectedExceptionCode 66601
     */
    public function replaceZeroErrorCodeWhenGeneratingCustomException(): void
    {
        Fault::throw('MyCustomException', '', 0);
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \MyNewCustomException
     * @expectedExceptionMessage custom exception message
     * @expectedExceptionCode 66666
     */
    public function throwsCustomException(): void
    {
        Fault::throw('MyNewCustomException', 'custom exception message', 666);
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \Exception
     */
    public function customExceptionsAreInstanceOfPhpBuildInExceptionByDefault(): void
    {
        Fault::throw('MyCustomException');
    }

    /**
     * @test
     * @coversNothing
     */
    public function eventStreamIsDisabledByDefault(): void
    {
        $eventStream = (new \ReflectionClass(Fault::class))->getProperty('eventStreamEnabled');
        $eventStream->setAccessible(true);

        self::assertFalse($eventStream->getValue());
    }

    /**
     * @test
     * @covers ::enableEventStream()
     * @covers ::disableEventStream()
     * @covers ::isEventStreamEnabled()
     */
    public function enableAndDisableEventStream(): void
    {
        Fault::enableEventStream();
        self::assertTrue(Fault::isEventStreamEnabled());

        Fault::disableEventStream();
        self::assertFalse(Fault::isEventStreamEnabled());
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \Omega\FaultManager\Exceptions\FaultManagerException
     */
    public function customExceptionIsInstanceOfFaultExceptionWhenEventStreamIsEnabled(): void
    {
        Fault::enableEventStream();
        Fault::throw('AnotherCustomException');
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
     * @expectedException \Omega\FaultManager\Exceptions\FaultManagerException
     * @expectedExceptionMessage Class 'EverythingGoneWrongMockedClass' could not be instantiated.
     */
    public function ifEverythingGoneWrong(): void
    {
        \Mockery::namedMock('EverythingGoneWrongMockedClass');
        Fault::throw('EverythingGoneWrongMockedClass');
    }

    /**
     * @after
     */
    protected function disableFaultEventStream(): void
    {
        if (Fault::isEventStreamEnabled()) {
            Fault::disableEventStream();
        }
    }
}
