<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 22/04/2018
 * Time: 14:12
 */

namespace Omega\FaultManager\Exceptions;

use Omega\FaultManager\Abstracts\FaultManagerException as AFaultManagerException;

/**
 * Class ExceptionNameIsEmpty
 * @package Omega\FaultManager\Exceptions
 * @codeCoverageIgnore
 */
class ExceptionNameIsEmpty extends AFaultManagerException
{
    /** @var int */
    protected $code = 66002;

    /** @var string */
    protected $message = 'Exception class must not be empty.';
}
