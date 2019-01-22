<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 27/04/2018
 * Time: 16:12
 */

namespace Omega\FaultManager\Interfaces;

/**
 * Interface FaultManagerEventHandler
 * @package Omega\FaultManager\Interfaces
 */
interface FaultManagerEventHandler
{
    /**
     * @param \Throwable $exception
     * @return mixed
     */
    public function __invoke(\Throwable $exception);
}
