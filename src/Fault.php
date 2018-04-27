<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 20/02/2018
 * Time: 01:55
 */

namespace Omega\FaultManager;

use Omega\FaultManager\Interfaces\FaultManager as IFaultManager;
use Omega\FaultManager\Traits\FaultGenerator as TFaultGenerator;

/**
 * Class Fault
 * @package Omega\FaultManager
 */
class Fault implements IFaultManager
{

    use TFaultGenerator;

    /** @var bool */
    private static $eventStreamEnabled = false;
    
    /**
     * Fault constructor.
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public static function exception(
        string $exceptionClass,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        array $arguments = []
    ): \Throwable {
        // Check if $class is empty
        if (empty($exceptionClass)) {
            throw new Exceptions\EmptyErrorNameException();
        }

        // Check if is namespace
        if (false !== \strpos($exceptionClass, '\\')) {
            throw new Exceptions\NamespacedErrorException();
        }

        $params = [&$message, $code, $previous];

        // Check if exceptionClass with that name already exists
        // we mute class_exists because we leave second parameter as a default (which is true by default)
        // in order to autoload the class if exists, but if we do not mute it and the class does not exists
        // then aside from returned boolean false, we get some php warnings like this:
        // Warning: include(/path/to/MyCustomException.php): failed to open stream: No such file or directory
        // That is normal behaviour since we ask to autoload a class which does not exists yet.
        // On the second run when we request the class that has been generated, it will be autoload here
        if (!@\class_exists($exceptionClass)) {
            // Check if $class has compatible exception class name
            $len = \strlen(Exceptions\FaultManagerException::EXCEPTION_CLASS_END);
            if (Exceptions\FaultManagerException::EXCEPTION_CLASS_END !== \substr($exceptionClass, -$len)) {
                throw new Exceptions\IncompatibleErrorNameException($exceptionClass);
            }

            // Default class to extend from
            $extendFromClass = \Exception::class;

            if (self::isEventStreamEnabled()) {
                // Since EventStream is enabled then we extend from FaultManagerException Abstract
                $extendFromClass = Abstracts\FaultManagerException::class;
            }

            // Persist generated exceptionClass into file under compiled directory
            self::persistFile(
                $exceptionClass,
                self::generateFileCode($exceptionClass, $extendFromClass)
            );

            // Load custom generated class
            self::loadCustomException(self::getFileSystem()->getCompiledExceptions([$exceptionClass])->current());
        }

        // Get exceptionClass interfaces
        $interfaces = (new \ReflectionClass($exceptionClass))->getInterfaceNames();

        // Make sure that the requested class is \Throwable
        if (!\in_array(\Throwable::class, $interfaces, true)) {
            throw new Exceptions\FaultManagerException(
                'The class "%s" does not implements Throwable interface.',
                null,
                null,
                [$exceptionClass]
            );
        }

        // Check if exceptionClass implements FaultManagerException interface or if is a Hoa\Exception
        if (\in_array(Interfaces\FaultManagerException::class, $interfaces, true) ||
            \in_array('Hoa\Exception', $interfaces, true)
        ) {
            // Then we pass $arguments as fourth parameter for constructor
            $params[] = $arguments;
        } elseif (0 < \count($arguments)) {
            // if there are arguments set then format the exception message
            $message = @vsprintf($message, $arguments);
        }

        // Get exception instance
        /** @var \Throwable $exception */
        $exception = (new \ReflectionClass($exceptionClass))->newInstanceArgs($params);

        // Get exception reflection
        $reflection = new \ReflectionObject($exception);

        // When running PHPUnit property "trace" is not available, works fine though in real world...
        // Maybe an xdebug issue?
        // @codeCoverageIgnoreStart

        // Set trace to null by default
        $trace = null;

        // Get trace
        if ($reflection->hasProperty('trace')) {
            $trace = $reflection->getProperty('trace');
        } elseif ($reflection->hasProperty('_trace')) {
            $parentClass = $reflection->getParentClass();
            // Get parent class \Exception
            while (\Exception::class !== $parentClass->getName()) {
                $parentClass = $parentClass->getParentClass();
            }
            $trace = $parentClass->getProperty('trace');
        }

        if (null !== $trace) {
            // Get trace
            $trace->setAccessible(true);

            // Get stack trace
            $stackTrace = $trace->getValue($exception);
            // Remove first in stack because it refers to ReflectionClass::newInstanceArgs() we called previously
            \array_shift($stackTrace);
            $trace->setValue($exception, $stackTrace);

            // Set "file" and "line" properties
            $file = $reflection->getProperty('file');
            $file->setAccessible(true);
            $file->setValue($exception, $stackTrace[0]['file']);

            $line = $reflection->getProperty('line');
            $line->setAccessible(true);
            $line->setValue($exception, $stackTrace[0]['line']);
        }
        // @codeCoverageIgnoreEnd

        return $exception;
    }

    /**
     * {@inheritdoc}
     */
    public static function throw(
        string $exceptionClass,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        array $arguments = []
    ): void {
        throw self::exception($exceptionClass, $message, $code, $previous, $arguments);
    }

    /**
     * {@inheritdoc}
     */
    public static function enableEventStream(): void
    {
        self::$eventStreamEnabled = true;
    }

    /**
     * {@inheritdoc}
     */
    public static function disableEventStream(): void
    {
        self::$eventStreamEnabled = false;
    }

    /**
     * {@inheritdoc}
     */
    public static function isEventStreamEnabled(): bool
    {
        return self::$eventStreamEnabled;
    }
}
