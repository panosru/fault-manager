<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 23/04/2018
 * Time: 14:10
 */

namespace Omega\FaultManager\Interfaces;

interface FaultManager
{
    /**
     * @param string $class
     * @param null|string $message
     * @param int $code
     * @param null|\Throwable $previous
     * @param array $arguments
     * @throws \Omega\FaultManager\Exceptions\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\EmptyErrorNameException
     * @throws \Omega\FaultManager\Exceptions\IncompatibleErrorNameException
     * @throws \Exception
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public static function throw(
        string $class,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        array $arguments = []
    );

    /**
     * Enables Event Stream for Exceptions
     */
    public static function enableEventStream(): void;

    /**
     * Disables Event Stream for Exceptions
     */
    public static function disableEventStream(): void;

    /**
     * Returns try if enabled false if not
     * @return bool
     */
    public static function isEventStreamEnabled(): bool;
}
