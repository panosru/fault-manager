<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 20/02/2018
 * Time: 01:55
 */

namespace Omega\FaultManager;

/**
 * Class Fault
 * @package Omega\FaultManager
 */
class Fault
{
    /**
     * Fault constructor.
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }

    /**
     * @param string $class
     * @param string $message
     * @param int $code
     * @param null|\Throwable $previous
     * @throws Exceptions\OmegaException
     * @throws Exceptions\EmptyErrorNameException
     * @throws Exceptions\IncompatibleErrorNameException
     * @throws \Exception
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public static function throw(string $class, string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        // Check if $class is empty
        if (empty($class)) {
            throw new Exceptions\EmptyErrorNameException();
        }
        
        // Check if class with that name already exists
        if (\class_exists($class)) {
            // Check that the class implements \Throwable interface
            $reflection = new \ReflectionClass($class);
            if ($reflection->implementsInterface(\Throwable::class)) {
                /** @var \Throwable $exception */
                $exception = new $class($message, $code, $previous);
            }
        } else {
            // Check if $class has compatible exception class name
            $len = \strlen(Exceptions\IncompatibleErrorNameException::EXCEPTION_CLASS_END);
            if (Exceptions\IncompatibleErrorNameException::EXCEPTION_CLASS_END !== \substr($class, -$len)) {
                throw new Exceptions\IncompatibleErrorNameException($class);
            }
            
            // Generate custom exception class
            /** @var \Throwable $exception */
            $exception = \Mockery::namedMock($class, \Exception::class, [$message, $code, $previous])
                ->makePartial()
                ->shouldIgnoreMissing();
        }

        if (isset($exception) && ($exception instanceof \Throwable)) {
            throw $exception;
        }

        throw new Exceptions\OmegaException("Class '{$class}' could not be instantiated.");
    }

    /**
     * @codeCoverageIgnore
     */
    public function __destruct()
    {
        \Mockery::close();
    }
}
