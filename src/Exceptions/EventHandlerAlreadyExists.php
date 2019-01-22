<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 23/04/2018
 * Time: 21:26
 */

namespace Omega\FaultManager\Exceptions;

use Omega\FaultManager\Abstracts\FaultManagerException as AFaultManagerException;

/**
 * Class EventHandlerAlreadyExists
 * @package Omega\FaultManager\Exceptions
 */
class EventHandlerAlreadyExists extends AFaultManagerException
{
    /** @var int */
    protected $code = 66006;

    /** @var string */
    protected $message = 'A handler for "%s" already exists.';

    /**
     * EventHandlerAlreadyExists constructor.
     * @param string $eventHandler
     */
    public function __construct(string $eventHandler)
    {
        $this->arguments[] = $eventHandler;

        parent::__construct();
    }
}
