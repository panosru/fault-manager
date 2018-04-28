<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 27/04/2018
 * Time: 11:20
 */

namespace Omega\FaultManager\Traits;

use Hoa\Event\Bucket;
use Hoa\Event\Event;
use Omega\FaultManager\Exceptions\EventHandlerExistsException;
use Omega\FaultManager\Interfaces\FaultManagerEventHandler as IFaultManagerEventHandler;

/**
 * Trait FaultEventStream
 * @package Omega\FaultManager\Traits
 */
trait FaultEventStream
{
    private static $eventStreamId = 'hoa://Event/Exception';

    /** @var bool */
    private static $eventStreamEnabled = false;

    /** @var array */
    private static $handlers = [];

    /** @var string */
    private static $eventStreamHandlerClosure;

    /**
     * {@inheritdoc}
     */
    public static function enableEventStream(): void
    {
        if (!self::isEventStreamEnabled()) {
            self::$eventStreamEnabled = true;

            if (!Event::getEvent(self::$eventStreamId)->isListened()) {
                Event::getEvent(self::$eventStreamId)->attach(self::eventStreamHandler());
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function disableEventStream(): void
    {
        if (self::isEventStreamEnabled()) {
            self::$eventStreamEnabled = false;

            if (Event::getEvent(self::$eventStreamId)->isListened()) {
                Event::unregister(self::$eventStreamId, true);
                self::$eventStreamHandlerClosure = null;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function isEventStreamEnabled(): bool
    {
        return self::$eventStreamEnabled;
    }

    /**
     * {@inheritdoc}
     */
    public static function registerHandler(
        string $eventId,
        IFaultManagerEventHandler $handler,
        bool $override = false
    ): void {
        if (\array_key_exists($eventId, self::$handlers) && !$override) {
            throw new EventHandlerExistsException($eventId);
        }

        self::$handlers[$eventId] = $handler;
    }

    /**
     * @param string $eventId
     */
    public static function unregisterHandler(string $eventId): void
    {
        if (isset(self::$handlers[$eventId])) {
            unset(self::$handlers[$eventId]);
        }
    }

    /**
     * @param \Hoa\Event\Source $router
     * @param \Throwable $exception
     * @throws \Hoa\Event\Exception
     */
    protected static function registerEvent(\Hoa\Event\Source $router, \Throwable $exception): void
    {
        if (!Event::eventExists(self::$eventStreamId)) {
            // @codeCoverageIgnoreStart
            Event::register(self::$eventStreamId, $router);
            // @codeCoverageIgnoreEnd
        }

        Event::notify(
            self::$eventStreamId,
            $router,
            new Bucket($exception)
        );
    }

    /**
     * @return \Closure
     */
    private static function eventStreamHandler(): \Closure
    {
        if (null === self::$eventStreamHandlerClosure) {
            $handlers = &self::$handlers;

            self::$eventStreamHandlerClosure = function (Bucket $bucket) use (&$handlers) {
                /** @var \Hoa\Exception\Exception $exception */
                $exception = $bucket->getData();

                // Execute handler for the particular exception
                if (isset($handlers[\get_class($exception)])) {
                    $handlers[\get_class($exception)]($exception);
                }

                // Execute global handler if exists
                if (isset($handlers[\Omega\FaultManager\Fault::ALL_EVENTS])) {
                    $handlers[\Omega\FaultManager\Fault::ALL_EVENTS]($exception);
                }
            };
        }

        return self::$eventStreamHandlerClosure;
    }
}
