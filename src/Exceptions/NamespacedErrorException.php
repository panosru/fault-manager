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
 * Class NamespacedErrorException
 * @package Omega\FaultManager\Exceptions
 * @codeCoverageIgnore
 */
class NamespacedErrorException extends AFaultManagerException
{
    /** @var int */
    protected $code = 66005;

    /** @var string */
    protected $message = 'Namespaces custom exceptions are not supported (yet).';
}
