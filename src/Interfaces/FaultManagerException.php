<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 23/04/2018
 * Time: 13:32
 */

namespace Omega\FaultManager\Interfaces;

interface FaultManagerException
{
    /** @var string */
    public const EXCEPTION_CLASS_END = 'Exception';

    /** @var int */
    public const ERROR_CODE_PREFIX = 66;

    /** @var int */
    public const ERROR_CODE_GENERATED = 601;

    /** @var int */
    public const ERROR_CODE_DEFAULT = 66001;
}
