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
 * Class IncompatibleErrorNameException
 * @package Omega\FaultManager\Exceptions
 */
class IncompatibleErrorNameException extends AFaultManagerException
{
    /** @var int */
    protected $code = 66003;

    /** @var string */
    protected $message = 'Exception class must end with "%s". Given name was: "%s".';

    /** @var array */
    protected $arguments = [self::EXCEPTION_CLASS_END];

    /**
     * IncompatibleErrorNameException constructor.
     * @param string $class
     */
    public function __construct(string $class)
    {
        $this->arguments[] = $class;

        parent::__construct();
    }
}
