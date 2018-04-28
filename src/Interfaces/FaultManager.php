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
    /** @var string */
    public const ALL_EVENTS = '*';

    /**
     * @param string $exceptionClass
     * @param string $message
     * @param int $code
     * @param null|\Throwable $previous
     * @param array $arguments
     * @return \Throwable
     * @throws \Throwable
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\EmptyErrorNameException
     * @throws \Omega\FaultManager\Exceptions\IncompatibleErrorNameException
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     * @throws \Omega\FaultManager\Exceptions\NamespacedErrorException
     * @throws \Hoa\Event\Exception
     * @throws \ReflectionException
     */
    public static function exception(
        string $exceptionClass,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        array $arguments = []
    ): \Throwable;

    /**
     * @param string $exceptionClass
     * @param string $message
     * @param int $code
     * @param null|\Throwable $previous
     * @param array $arguments
     * @throws \Throwable
     * @throws \Omega\FaultManager\Abstracts\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\FaultManagerException
     * @throws \Omega\FaultManager\Exceptions\EmptyErrorNameException
     * @throws \Omega\FaultManager\Exceptions\IncompatibleErrorNameException
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     * @throws \Omega\FaultManager\Exceptions\NamespacedErrorException
     * @throws \Hoa\Event\Exception
     * @throws \ReflectionException
     */
    public static function throw(
        string $exceptionClass,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        array $arguments = []
    ): void;

    /**
     * @param string $eventId
     * @param FaultManagerEventHandler $handler
     * @param bool $override
     * @throws \Omega\FaultManager\Exceptions\EventHandlerExistsException
     */
    public static function registerHandler(
        string $eventId,
        FaultManagerEventHandler $handler,
        bool $override = false
    ): void;

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

    /**
     * Set compile path
     * @param string $path
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     */
    public static function setCompilePath(string $path): void;

    /**
     * Get compile path
     * @return string
     */
    public static function getCompilePath(): string;

    /**
     * Autoload compiled exceptions
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     */
    public static function autoloadCompiledExceptions(): void;
}
