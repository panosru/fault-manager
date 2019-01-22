<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 20/02/2018
 * Time: 02:25
 */

namespace Omega\FaultManager\Exceptions;

use Omega\FaultManager\Abstracts\FaultManagerException as AFaultManagerException;

/**
 * Class BaseError
 * @package Omega\FaultManager\Exceptions
 * @codeCoverageIgnore
 */
class BaseError extends AFaultManagerException
{
    /** @var int */
    protected $code = 66001;
}
