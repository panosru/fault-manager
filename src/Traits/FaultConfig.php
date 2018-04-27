<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 27/04/2018
 * Time: 01:08
 */

namespace Omega\FaultManager\Traits;

trait FaultConfig
{
    private $expectedConfigOptions = [
        'compile_path', 'event_stream', 'environment'
    ];

    /** @var array */
    private $config;

    public function setConfig(array $config): void
    {
        \array_walk($config, function (&$value, $key) use (&$config) {
            if (!\in_array($value, $this->expectedConfigOptions, true)) {
                unset($config[$key]);
            }

            if (\is_string($value)) {
                $value = \strtolower($value);
            }
        });

        $this->config = $config;
    }
}