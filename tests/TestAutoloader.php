<?php
declare(strict_types=1);

/**
 * Author: panosru
 * Date: 24/04/2018
 * Time: 12:42
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';

\Omega\FaultManager\Fault::setCompilePath(dirname(__DIR__) . '/tests/_compiled/');
\Omega\FaultManager\Fault::autoloadCompiledExceptions();
