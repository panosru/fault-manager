<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 23/04/2018
 * Time: 14:51
 */

namespace Omega\FaultManager\Abstracts;

use Omega\FaultManager\Interfaces\FaultManagerException as IFaultManagerException;
use Omega\FaultManager\Traits\FaultMutator as TFaultMutator;

abstract class FaultManagerException extends \Hoa\Exception\Exception implements IFaultManagerException
{
    use TFaultMutator;

    /** @var int */
    protected $code = 66000;

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

    /**
     * Override parent::send()
     *
     * Sends the exception on `hoa://Event/Exception`.
     * @codeCoverageIgnore
     */
    public function send(): void
    {
        self::mutate($this);

        \Hoa\Event\Event::notify(
            'hoa://Event/Exception',
            $this,
            new \Hoa\Event\Bucket($this)
        );
    }
}
