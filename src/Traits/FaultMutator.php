<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 27/04/2018
 * Time: 21:23
 */

namespace Omega\FaultManager\Traits;

/**
 * Trait FaultMutator
 * @package Omega\FaultManager\Traits
 * @codeCoverageIgnore
 */
trait FaultMutator
{
    /**
     * @param \Throwable $exception
     *
     * @throws \ReflectionException
     */
    protected static function mutate(\Throwable $exception): void
    {
        // Get exception reflection
        $reflection = new \ReflectionObject($exception);

        // When running PHPUnit property "trace" is not available, works fine though in real world...
        // Maybe an xdebug issue?

        // Get trace
        if ($reflection->hasProperty('trace')) {
            $trace = $reflection->getProperty('trace');
        } else {
            $parentClass = $reflection->getParentClass();
            // Get parent class \Exception
            while (\Exception::class !== $parentClass->getName()) {
                $parentClass = $parentClass->getParentClass();
            }
            $trace = $parentClass->getProperty('trace');
        }

        // Get trace
        $trace->setAccessible(true);

        // Get stack trace
        $stackTrace = $trace->getValue($exception);
        // Some times $stackTrace may be empty, especially when we call custom generated exceptions with
        // traditional way like throw new \MyCustomGeneratedException()
        if (0 < \count($stackTrace)) {
            // Remove first in stack because it refers to ReflectionClass::newInstanceArgs() we called previously
            \array_shift($stackTrace);
            // Remove 'Fault::throw()' from trace if present
            if (0 === \strcmp('exception', $stackTrace[0]['function']) &&
                (
                    isset($stackTrace[1]) &&
                    0 === \strcmp('throw', $stackTrace[1]['function'])
                )
            ) {
                \array_shift($stackTrace);
            }
            $trace->setValue($exception, $stackTrace);

            // Set "file" and "line" properties
            $file = $reflection->getProperty('file');
            $file->setAccessible(true);
            $file->setValue($exception, $stackTrace[0]['file']);

            $line = $reflection->getProperty('line');
            $line->setAccessible(true);
            $line->setValue($exception, $stackTrace[0]['line']);
        }
    }
}
