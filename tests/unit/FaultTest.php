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
    /** @var string */
    private const TESTNIG_CUSTOM_EXCEPTION = 'MyCustomTestingException';

    /** @var string */
    private const TESTING_CUSTOM_EVENT_EXCEPTION = 'MyCustomTestingEventException';

    /** @var array */
    private $testingFiles;

    /** @var \League\Flysystem\Filesystem */
    private $fileSystem;

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
     * @covers ::exception()
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage bad method call
     */
    public function throwsExceptionThatIsAlreadyDefined(): void
    {
        throw Fault::exception(\BadMethodCallException::class, 'bad method call');
    }

    /**
     * @test
     * @covers ::exception()
     */
    public function doNotCompileAlreadyDefinedExceptions(): void
    {
        Fault::exception(\BadMethodCallException::class);
        self::assertFalse($this->fileSystem->has($this->testingFiles[self::TESTNIG_CUSTOM_EXCEPTION]));
    }

    /**
     * @test
     * @covers ::exception()
     * @expectedException \MyCustomTestingException
     * @expectedExceptionMessage custom exception message
     * @expectedExceptionCode 666
     */
    public function throwsCustomException(): void
    {
        throw Fault::exception(
            self::TESTNIG_CUSTOM_EXCEPTION,
            'custom exception message',
            666
        );
    }

    /**
     * @test
     * @covers ::exception()
     * @expectedException \Exception
     */
    public function customExceptionsAreInstanceOfPhpBuildInExceptionByDefault(): void
    {
        throw Fault::exception(self::TESTNIG_CUSTOM_EXCEPTION);
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
     * @covers ::exception()
     * @expectedException \MyCustomTestingEventException
     */
    public function customExceptionIsInstanceOfFaultExceptionWhenEventStreamIsEnabled(): void
    {
        Fault::enableEventStream();
        $exception = Fault::exception(self::TESTING_CUSTOM_EVENT_EXCEPTION);

        self::assertInstanceOf(\Omega\FaultManager\Interfaces\FaultManagerException::class, $exception);

        throw $exception;
    }

    /**
     * @test
     * @covers ::exception()
     * @expectedException \Omega\FaultManager\Exceptions\EmptyErrorNameException
     */
    public function throwsExceptionIfNoExceptionNameIsGiven(): void
    {
        throw Fault::exception('');
    }

    /**
     * @test
     * @covers ::exception()
     * @expectedException \Omega\FaultManager\Exceptions\IncompatibleErrorNameException
     */
    public function throwsExceptionIfIncompatibleNameIsGiven(): void
    {
        throw Fault::exception('IncompatibleClass');
    }

    /**
     * @before
     * @throws ReflectionException
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     */
    protected function disableFaultEventStreamIfEnabled(): void
    {
        Fault::setCompilePath(dirname(__DIR__) . '/_compiled/');
        if (Fault::isEventStreamEnabled()) {
            Fault::disableEventStream();
        }

        if (null === $this->fileSystem) {
            $reflector = new \ReflectionClass(Fault::class);
            $makeFileName = $reflector->getMethod('makeFileName');
            $makeFileName->setAccessible(true);
            $fileSystem = $reflector->getMethod('getFileSystem');
            $fileSystem->setAccessible(true);
            $this->fileSystem = $fileSystem->invoke($reflector);

            $this->testingFiles[self::TESTNIG_CUSTOM_EXCEPTION] = $makeFileName->invoke(
                $reflector,
                self::TESTNIG_CUSTOM_EXCEPTION
            );

            $this->testingFiles[self::TESTING_CUSTOM_EVENT_EXCEPTION] = $makeFileName->invoke(
                $reflector,
                self::TESTING_CUSTOM_EVENT_EXCEPTION
            );
        }
    }

    /**
     * @after
     * @throws \League\Flysystem\FileNotFoundException
     */
    protected function checkIfTestingExceptionAlreadyExistsAndDeleteIt(): void
    {
        // loop through testing exception files
        foreach ($this->testingFiles as $file) {
            // Check if file exists
            if ($this->fileSystem->has($file)) {
                // unlink it
                $this->fileSystem->delete($file);
            }
        }
    }
}
