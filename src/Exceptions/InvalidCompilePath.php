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
 * Class InvalidCompilePath
 * @package Omega\FaultManager\Exceptions
 */
class InvalidCompilePath extends AFaultManagerException
{
    /** @var int */
    protected $code = 66004;

    /** @var string */
    protected $message = 'Path "%s" does not exist or is not writable.';

    /**
     * InvalidCompilePath constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->arguments[] = $path;

        parent::__construct();
    }
}
