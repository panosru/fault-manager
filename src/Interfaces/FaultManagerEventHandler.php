<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 27/04/2018
 * Time: 16:12
 */

namespace Omega\FaultManager\Interfaces;

interface FaultManagerEventHandler
{
    public function __invoke(\Throwable $exception);
}
