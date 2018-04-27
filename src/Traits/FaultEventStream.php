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

trait FaultEventStream
{
    /** @var bool */
    protected static $eventStreamEnabled = false;

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

    /**
     * @param \Hoa\Event\Source $router
     * @param \Throwable $exception
     * @throws \Hoa\Event\Exception
     */
    protected static function registerEvent(\Hoa\Event\Source $router, \Throwable $exception): void
    {
        if (!Event::eventExists('hoa://Event/Exception')) {
            Event::register('hoa://Event/Exception', $router); // @codeCoverageIgnore
        }

        Event::notify(
            'hoa://Event/Exception',
            $router,
            new Bucket($exception)
        );
    }
}
