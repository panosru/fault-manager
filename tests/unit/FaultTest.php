<?php

declare(strict_types = 1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:29
 */

namespace Omega\FaultManagerTests;

use Omega\FaultManager\Fault;
use PHPUnit\Framework\TestCase;

/**
 * Class FaultTest
 * @coversDefaultClass \Omega\FaultManager\Fault
 */
class FaultTest extends TestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    /** @var string */
    private const TESTNIG_CUSTOM_EXCEPTION = 'MyCustomTestingException';

    /** @var string */
    private const TESTING_CUSTOM_EVENT_EXCEPTION = 'MyCustomTestingEventException';

    /** @var string */
    private const TESTING_CUSTOM_NAMESPACED_EXCEPTION = 'MyCustomNamespace\MyCustomException';

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
     * @covers ::getFileSystem()
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
     * @expectedException \Omega\FaultManager\Exceptions\NamespacedErrorException
     */
    public function throwsExceptionIfNamespacedCustomExceptionIsProvided(): void
    {
        throw Fault::exception(self::TESTING_CUSTOM_NAMESPACED_EXCEPTION);
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
     * @test
     * @covers ::exception()
     * @expectedException \Omega\FaultManager\Exceptions\FaultManagerException
     * @expectedExceptionMessage The class "NonThrowableMockException" does not implements Throwable interface.
     * @expectedExceptionCode 66001
     */
    public function classIsNotThrowableThusAnExceptionMustBeThrown(): void
    {
        \Mockery::mock('NonThrowableMockException');

        throw Fault::exception('NonThrowableMockException');
    }

    /**
     * @test
     * @covers ::exception()
     * @expectedException \Exception
     * @expectedExceptionMessage bad message
     */
    public function interpolateNonEventExceptionMessage(): void
    {
        throw Fault::exception(\Exception::class, 'bad %s', 0, null, ['message']);
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \Exception
     * @expectedExceptionMessage bad message
     * @expectedExceptionCode 0
     */
    public function checkThrowsMethod(): void
    {
        Fault::throw(\Exception::class, 'bad message');
    }

    /**
     * @test
     * @covers ::throw()
     * @expectedException \MyCustomTestingEventException
     * @expectedExceptionMessage hello world
     * @expectedExceptionCode 66000
     */
    public function throwEventExceptionWithArguments(): void
    {
        Fault::enableEventStream();
        Fault::throw(
            self::TESTING_CUSTOM_EVENT_EXCEPTION,
            'hello %s',
            0,
            null,
            ['world']
        );
    }

    /**
     * @test
     * @covers ::setCompilePath()
     * @covers ::getCompilePath()
     */
    public function checkCompilePath(): void
    {
        Fault::setCompilePath(__DIR__);
        self::assertEquals(__DIR__ . \DIRECTORY_SEPARATOR, Fault::getCompilePath());
    }

    /**
     * @test
     * @covers ::setCompilePath()
     * @expectedException \Omega\FaultManager\Exceptions\InvalidCompilePathException
     * @expectedExceptionMessage Path "/some/invalid/path/" does not exist or is not writable.
     * @expectedExceptionCode 66004
     */
    public function handleInvalidPath(): void
    {
        Fault::setCompilePath('/some/invalid/path');
    }

    /**
     * @test
     * @covers ::autoloadCompiledExceptions()
     * @covers ::loadCustomException()
     * @runInSeparateProcess
     */
    public function checkAutoloader(): void
    {
        $path = \dirname(__DIR__) . '/_support/';
        // Generate two exceptions without Fault
        $this->fileSystem->put(
            self::TESTNIG_CUSTOM_EXCEPTION . '.php',
            \file_get_contents($path . 'test_exception_generated_code')
        );
        $this->fileSystem->put(
            self::TESTING_CUSTOM_EVENT_EXCEPTION . '.php',
            \file_get_contents($path . 'test_event_exception_generated_code')
        );

        // Make sure that files exist
        self::assertTrue($this->fileSystem->has(self::TESTNIG_CUSTOM_EXCEPTION . '.php'));
        self::assertTrue($this->fileSystem->has(self::TESTING_CUSTOM_EVENT_EXCEPTION . '.php'));

        // Generated exceptions are not loaded yet
        self::assertFalse(\class_exists(self::TESTNIG_CUSTOM_EXCEPTION, false));
        self::assertFalse(\class_exists(self::TESTING_CUSTOM_EVENT_EXCEPTION, false));

        Fault::autoloadCompiledExceptions();

        // Generated exceptions should now be available
        self::assertTrue(\class_exists(self::TESTNIG_CUSTOM_EXCEPTION, false));
        self::assertTrue(\class_exists(self::TESTING_CUSTOM_EVENT_EXCEPTION, false));
    }

    /**
     * @test
     * @covers ::getFileSystem()
     * @covers ::makeFileName()
     * @covers ::persistFile()
     * @covers ::loadCustomException()
     * @covers ::generateFileCode()
     * @runInSeparateProcess
     */
    public function checkCompiler(): void
    {
        // Generate \Exception
        Fault::exception(self::TESTNIG_CUSTOM_EXCEPTION);

        self::assertTrue($this->fileSystem->has(
            self::TESTNIG_CUSTOM_EXCEPTION . '.php'
        ));

        self::assertEquals(
            \md5_file(\dirname(__DIR__) . '/_support/test_exception_generated_code'),
            \md5_file(Fault::getCompilePath() . self::TESTNIG_CUSTOM_EXCEPTION . '.php')
        );

        Fault::enableEventStream();
        Fault::exception(self::TESTING_CUSTOM_EVENT_EXCEPTION);

        self::assertTrue($this->fileSystem->has(
            self::TESTING_CUSTOM_EVENT_EXCEPTION . '.php'
        ));

        self::assertEquals(
            \md5_file(\dirname(__DIR__) . '/_support/test_event_exception_generated_code'),
            \md5_file(Fault::getCompilePath() . self::TESTING_CUSTOM_EVENT_EXCEPTION . '.php')
        );
    }

    /**
     * @test
     * @coversNothing
     * @expectedException \MyCustomTestingEventException
     */
    public function checkIfCustomEventPassedToEventStream(): void
    {
        Fault::enableEventStream();

        $exceptionMessage = 'bad message passed to event.';
        
        $spy = \Mockery::spy('MySpy')
            ->shouldReceive('getExceptionData')
            ->once()
            ->with($exceptionMessage)
            ->getMock();

        \Hoa\Event\Event::getEvent('hoa://Event/Exception')
            ->attach(function (\Hoa\Event\Bucket $bucket) use ($spy, $exceptionMessage) {
            /** @var \Hoa\Exception\Exception $exception */
            $exception = $bucket->getData();
            if (0 === \strcmp($exceptionMessage, $exception->getMessage())) {
                $spy->getExceptionData($exception->getMessage());
            }
        });
        
        Fault::throw(
            self::TESTING_CUSTOM_EVENT_EXCEPTION,
            'bad message passed to %s.',
            0,
            null,
            ['event']
        );
    }

    /**
     * @test
     * @covers ::registerEvent()
     * @covers ::exception()
     * @expectedException \Exception
     */
    public function routeToEventStreamNonEventException(): void
    {
        Fault::enableEventStream();

        $exceptionMessage = 'bad message passed to event from non event exception!';

        $spy = \Mockery::spy('MySpy')
            ->shouldReceive('getExceptionData')
            ->once()
            ->with($exceptionMessage)
            ->getMock();

        \Hoa\Event\Event::getEvent('hoa://Event/Exception')
            ->attach(function (\Hoa\Event\Bucket $bucket) use ($spy, $exceptionMessage) {
                /** @var \Hoa\Exception\Exception $exception */
                $exception = $bucket->getData();
                if (0 === \strcmp($exceptionMessage, $exception->getMessage())) {
                    $spy->getExceptionData($exception->getMessage());
                }
            });

        Fault::throw(
            \Exception::class,
            'bad message passed to %s from %s exception!',
            0,
            null,
            ['event', 'non event']
        );
    }

    /**
     * @before
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     * @throws \ReflectionException
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
