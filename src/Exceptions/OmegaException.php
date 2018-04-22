<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 20/02/2018
 * Time: 02:25
 */

namespace Omega\FaultManager\Exceptions;

/**
 * Class OmegaException
 * @package Omega\FaultManager\Exceptions
 */
class OmegaException extends \Hoa\Exception\Exception
{
    /** @var int */
    protected $code = 66001;

    /** @var string */
    protected $message = '';

    /** @var array */
    protected $arguments = [];

    public function __construct(
        ?string $message = null,
        ?int $code = null,
        ?array $arguments = null,
        ?\Throwable $previous = null
    ) {
        parent::__construct(
            $message ?? $this->message,
            $code ?? $this->code,
            $arguments ?? $this->arguments,
            $previous
        );
    }
}
