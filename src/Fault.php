<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 20/02/2018
 * Time: 01:55
 */

namespace Omega\FaultManager;

use Omega\FaultManager\Interfaces\FaultManager as IFaultManager;

/**
 * Class Fault
 * @package Omega\FaultManager
 */
class Fault implements IFaultManager
{
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
    public static function throw(
        string $class,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        array $arguments = []
    ) {
        // Check if $class is empty
        if (empty($class)) {
            throw new Exceptions\EmptyErrorNameException();
        }

        // Check if class with that name already exists
        if (\class_exists($class, false)) {
            // Check that the class implements \Throwable interface
            $reflection = new \ReflectionClass($class);
            if ($reflection->implementsInterface(\Throwable::class)) {
                /** @var \Throwable $exception */
                $exception = new $class($message, $code, $previous);
            }
        } else {
            // Check if $class has compatible exception class name
            $len = \strlen(Exceptions\FaultManagerException::EXCEPTION_CLASS_END);
            if (Exceptions\FaultManagerException::EXCEPTION_CLASS_END !== \substr($class, -$len)) {
                throw new Exceptions\IncompatibleErrorNameException($class);
            }

            // If $error = 0 then set error code value to default
            if (0 === $code) {
                $code = Interfaces\FaultManagerException::ERROR_CODE_GENERATED;
            }

            // Add default error code prefix to generated exception
            $code = (int)(Interfaces\FaultManagerException::ERROR_CODE_PREFIX . $code);

            if (static::isEventStreamEnabled()) {
                // Because of Mockery issue#534 (https://github.com/mockery/mockery/issues/534)
                // and since \Hoa\Exception\Idle::__constructor() uses $this->getArguments()
                // we cannot mock the object with \Mockery::namedMock($class, $extendFromClass, $params)
                // when event stream is enabled therefore we will have to implement a reflection
                // that will instantiate the object and pass it without custom name
                $exception = (new \ReflectionClass(Exceptions\FaultManagerException::class))
                    ->newInstanceArgs([$message, $code, $previous, $arguments]);
            } else {
                /** @var \Throwable $exception */
                $exception = \Mockery::namedMock($class, \Exception::class, [$message, $code, $previous])
                    ->shouldIgnoreMissing()
                    ->asUndefined()
                    ->makePartial();
            }
        }

        if (isset($exception) && ($exception instanceof \Throwable)) {
            throw $exception;
        }

        throw new Exceptions\FaultManagerException("Class '{$class}' could not be instantiated.");
    }

    /**
     * {@inheritdoc}
     */
    public static function enableEventStream(): void
    {
        static::$eventStreamEnabled = true;
    }

    /**
     * {@inheritdoc}
     */
    public static function disableEventStream(): void
    {
        static::$eventStreamEnabled = false;
    }

    /**
     * {@inheritdoc}
     */
    public static function isEventStreamEnabled(): bool
    {
        return static::$eventStreamEnabled;
    }


    /**
     * @codeCoverageIgnore
     */
    public function __destruct()
    {
        \Mockery::close();
    }
}
