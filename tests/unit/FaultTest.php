<?php

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 19:29
 */

declare(strict_types=1);

namespace Omega\FaultManagerTests;

use League\Flysystem\Filesystem;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Omega\FaultManager\Exceptions\BaseError;
use Omega\FaultManager\Exceptions\EventHandlerAlreadyExists;
use Omega\FaultManager\Exceptions\ExceptionNameIsEmpty;
use Omega\FaultManager\Exceptions\NamespaceError;
use Omega\FaultManager\Fault;
use PHPUnit\Framework\TestCase;
use const Omega\FaultManager\Exceptions\InvalidCompilePath;

/**
 * Class FaultTest
 * @coversDefaultClass \Omega\FaultManager\Fault
 */
class FaultTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private const TESTNIG_CUSTOM_EXCEPTION = 'MyCustomTestingException';

    /** @var string */
    private const TESTING_CUSTOM_EVENT_EXCEPTION = 'MyCustomTestingEventException';

    /** @var string */
    private const TESTING_CUSTOM_NAMESPACED_EXCEPTION = 'MyCustomNamespace\MyCustomException';

    /** @var array|null */
    private $testingFiles;

    /** @var \League\Flysystem\Filesystem|null */
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
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function throwsExceptionThatIsAlreadyDefined(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage("bad method call");

        throw Fault::exception(\BadMethodCallException::class, 'bad method call');
    }

    /**
     * @test
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function doNotCompileAlreadyDefinedExceptions(): void
    {
        Fault::exception(\BadMethodCallException::class);
        self::assertFalse($this->fileSystem->has($this->testingFiles[self::TESTNIG_CUSTOM_EXCEPTION]));
    }

    /**
     * @test
     * @covers ::exception()
     * @covers ::fileSystem()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function throwsCustomException(): void
    {
        $this->expectException(\MyCustomTestingException::class);
        $this->expectExceptionMessage("custom exception message");
        $this->expectExceptionCode(666);

        throw Fault::exception(
            self::TESTNIG_CUSTOM_EXCEPTION,
            'custom exception message',
            666
        );
    }

    /**
     * @test
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function customExceptionsAreInstanceOfPhpBuildInExceptionByDefault(): void
    {
        $this->expectException(\Exception::class);

        throw Fault::exception(self::TESTNIG_CUSTOM_EXCEPTION);
    }

    /**
     * @test
     * @covers ::exception()
     * @coversDefaultClass \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function throwsExistingNamespacedException(): void
    {
        $this->expectException(ExceptionNameIsEmpty::class);
        $this->expectExceptionMessage("Exception class must not be empty.");
        $this->expectExceptionCode(66002);

        throw Fault::exception(ExceptionNameIsEmpty::class);
    }

    /**
     * @test
     * @coversNothing
     * @throws \ReflectionException
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
     * @covers ::eventStreamHandler()
     */
    public function enableAndDisableEventStream(): void
    {
        Fault::enableEventStream();
        self::assertTrue(Fault::isEventStreamEnabled());
        self::assertTrue(\Hoa\Event\Event::getEvent('hoa://Event/Exception')->isListened());

        Fault::disableEventStream();
        self::assertFalse(Fault::isEventStreamEnabled());
        self::assertFalse(\Hoa\Event\Event::getEvent('hoa://Event/Exception')->isListened());
    }

    /**
     * @test
     * @covers ::registerHandler()
     * @covers ::unregisterHandler()
     * @throws \Omega\FaultManager\Exceptions\EventHandlerAlreadyExists
     */
    public function registerAndUnregisterEventHandler(): void
    {
        $eventId = 'TestEventId';
        $handlerMock = \Mockery::mock(\Omega\FaultManager\Interfaces\FaultManagerEventHandler::class);

        $reflection = new \ReflectionClass(Fault::class);

        $handlers = $reflection->getProperty('handlers');
        $handlers->setAccessible(true);

        self::assertCount(0, $handlers->getValue($reflection));
        Fault::registerHandler($eventId, $handlerMock);
        self::assertCount(1, $handlers->getValue($reflection));
        Fault::unregisterHandler($eventId);
        self::assertCount(0, $handlers->getValue($reflection));
    }

    /**
     * @test
     * @covers ::registerHandler()
     */
    public function registerExistingEventHandlerWithoutOverride(): void
    {
        $this->expectException(EventHandlerAlreadyExists::class);

        $eventId = 'TestEventId';
        $handlerMock = \Mockery::mock(\Omega\FaultManager\Interfaces\FaultManagerEventHandler::class);

        Fault::registerHandler($eventId, $handlerMock);
        Fault::registerHandler($eventId, $handlerMock);
    }

    /**
     * @test
     * @covers ::registerHandler()
     * @throws \Omega\FaultManager\Exceptions\EventHandlerAlreadyExists
     */
    public function registerExistingEventHandlerWithOverride(): void
    {
        $eventId = 'TestEventId';
        $handlerMock = \Mockery::mock(\Omega\FaultManager\Interfaces\FaultManagerEventHandler::class);

        $reflection = new \ReflectionClass(Fault::class);

        $handlers = $reflection->getProperty('handlers');
        $handlers->setAccessible(true);

        self::assertCount(0, $handlers->getValue($reflection));
        Fault::registerHandler($eventId, $handlerMock);
        self::assertCount(1, $handlers->getValue($reflection));
        Fault::registerHandler($eventId, $handlerMock, true);
        self::assertCount(1, $handlers->getValue($reflection));
    }

    /**
     * @test
     * @covers ::registerHandler()
     * @covers ::exception()
     * @covers ::eventStreamHandler()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\EventHandlerAlreadyExists
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function registerEventHandler(): void
    {
        Fault::enableEventStream();

        $handlerMock = \Mockery::spy(\Omega\FaultManager\Interfaces\FaultManagerEventHandler::class)
            ->shouldReceive('__invoke')
            ->times(4)
            ->getMock();

        Fault::registerHandler(\Exception::class, $handlerMock);
        Fault::registerHandler(self::TESTING_CUSTOM_EVENT_EXCEPTION, $handlerMock);
        Fault::registerHandler(Fault::ALL_EVENTS, $handlerMock);
        Fault::exception(\Exception::class);
        Fault::exception(self::TESTING_CUSTOM_EVENT_EXCEPTION);
    }

    /**
     * @test
     * @covers ::registerEvent()
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function routeToEventStreamNonEventException(): void
    {
        $this->expectException(\Exception::class);

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
     * @test
     * @coversNothing
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function checkIfCustomEventPassedToEventStream(): void
    {
        $this->expectException(\MyCustomTestingEventException::class);

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
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function customExceptionIsInstanceOfFaultExceptionWhenEventStreamIsEnabled(): void
    {
        $this->expectException(\MyCustomTestingEventException::class);

        Fault::enableEventStream();
        $exception = Fault::exception(self::TESTING_CUSTOM_EVENT_EXCEPTION);

        self::assertInstanceOf(\Omega\FaultManager\Interfaces\FaultManagerException::class, $exception);

        throw $exception;
    }

    /**
     * @test
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function throwsExceptionIfNamespacedCustomExceptionIsProvided(): void
    {
        $this->expectException(NamespaceError::class);

        throw Fault::exception(self::TESTING_CUSTOM_NAMESPACED_EXCEPTION);
    }

    /**
     * @test
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function throwsExceptionIfNoExceptionNameIsGiven(): void
    {
        $this->expectException(\Omega\FaultManager\Exceptions\ExceptionNameIsEmpty::class);

        throw Fault::exception('');
    }

    /**
     * @test
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function classIsNotThrowableThusAnExceptionMustBeThrown(): void
    {
        $this->expectException(BaseError::class);
        $this->expectExceptionMessage('The class "NonThrowableMockException" does not implements Throwable interface.');
        $this->expectExceptionCode(66001);

        \Mockery::mock('NonThrowableMockException');

        throw Fault::exception('NonThrowableMockException');
    }

    /**
     * @test
     * @covers ::exception()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function interpolateNonEventExceptionMessage(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("bad message");

        throw Fault::exception(\Exception::class, 'bad %s', 0, null, ['message']);
    }

    /**
     * @test
     * @covers ::throw()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function checkThrowsMethod(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("bad message");
        $this->expectExceptionCode(0);

        Fault::throw(\Exception::class, 'bad message');
    }

    /**
     * @test
     * @covers ::throw()
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function throwEventExceptionWithArguments(): void
    {
        $this->expectException(\MyCustomTestingEventException::class);
        $this->expectExceptionMessage("hello world");
        $this->expectExceptionCode(66000);

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
     * @covers ::compilePath()
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     */
    public function checkCompilePath(): void
    {
        Fault::setCompilePath(__DIR__);
        self::assertEquals(__DIR__ . \DIRECTORY_SEPARATOR, Fault::compilePath());
    }

    /**
     * @test
     * @covers ::setCompilePath()
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     */
    public function handleInvalidPath(): void
    {
        $this->expectException(InvalidCompilePath::class);
        $this->expectExceptionMessage('Path "/some/invalid/path/" does not exist or is not writable.');
        $this->expectExceptionCode(66004);

        Fault::setCompilePath('/some/invalid/path');
    }

    /**
     * @test
     * @covers ::autoloadCompiledExceptions()
     * @covers ::loadCustomException()
     * @runInSeparateProcess
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
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
     * @covers ::fileSystem()
     * @covers ::makeFileName()
     * @covers ::persistFile()
     * @covers ::loadCustomException()
     * @covers ::generateFileCode()
     * @runInSeparateProcess
     * @throws \Hoa\Event\Exception
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\BaseError
     * @throws \Omega\FaultManager\Exceptions\ExceptionNameIsEmpty
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \Omega\FaultManager\Exceptions\NamespaceError
     * @throws \ReflectionException
     * @throws \Throwable
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
            \md5_file(Fault::compilePath() . self::TESTNIG_CUSTOM_EXCEPTION . '.php')
        );

        Fault::enableEventStream();
        Fault::exception(self::TESTING_CUSTOM_EVENT_EXCEPTION);

        self::assertTrue($this->fileSystem->has(
            self::TESTING_CUSTOM_EVENT_EXCEPTION . '.php'
        ));

        self::assertEquals(
            \md5_file(\dirname(__DIR__) . '/_support/test_event_exception_generated_code'),
            \md5_file(Fault::compilePath() . self::TESTING_CUSTOM_EVENT_EXCEPTION . '.php')
        );
    }

    /**
     * @before
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     * @throws \ReflectionException
     */
    protected function disableFaultEventStreamIfEnabled(): void
    {
        Fault::setCompilePath(dirname(__DIR__) . '/_compiled/');

        if (null === $this->fileSystem) {
            $reflector = new \ReflectionClass(Fault::class);
            $makeFileName = $reflector->getMethod('makeFileName');
            $makeFileName->setAccessible(true);
            $fileSystem = $reflector->getMethod('fileSystem');
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
        Fault::disableEventStream();

        // Clean any event handlers if exist
        $reflection = new \ReflectionClass(Fault::class);
        $handlers = $reflection->getProperty('handlers');
        $handlers->setAccessible(true);
        $handlers = $handlers->getValue($reflection);

        foreach ($handlers as $eventId => $handler) {
            Fault::unregisterHandler($eventId);
        }

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
