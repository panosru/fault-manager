<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 23/04/2018
 * Time: 14:51
 */

namespace Omega\FaultManager\Abstracts;

use Omega\FaultManager\Interfaces\FaultManagerException as IFaultManagerException;

abstract class FaultManagerException extends \Hoa\Exception\Exception implements IFaultManagerException
{
    /** @var int */
    protected $code = self::ERROR_CODE_DEFAULT;

    /** @var string */
    protected $message = '';

    /** @var array */
    protected $arguments = [];

    /**
     * FaultManagerException constructor.
     * @param null|string $message
     * @param int|null $code
     * @param null|\Throwable $previous
     * @param array|null $arguments
     */
    public function __construct(
        ?string $message = null,
        ?int $code = null,
        ?\Throwable $previous = null,
        ?array $arguments = null
    ) {
        parent::__construct(
            $message ?? $this->message,
            $code ?? $this->code,
            $arguments ?? $this->arguments,
            $previous
        );
    }
}
