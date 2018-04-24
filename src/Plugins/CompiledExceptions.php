<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 24/04/2018
 * Time: 13:07
 */

namespace Omega\FaultManager\Plugins;

use League\Flysystem\FilesystemInterface as IFilesystemInterface;
use League\Flysystem\PluginInterface as IPluginInterface;
use Omega\FaultManager\Interfaces\FaultManagerException as IFaultManagerException;

class CompiledExceptions implements IPluginInterface
{
    /** @var bool */
    public const RETURN_IN_ARRAY = true;

    /** @var bool */
    public const RETURN_NOT_IN_ARRAY = false;

    /** @var IFilesystemInterface */
    protected $filesystem;

    /**
     * @param IFilesystemInterface $filesystem
     */
    public function setFilesystem(IFilesystemInterface $filesystem): void
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'getCompiledExceptions';
    }

    /**
     * @param array|null $filter
     * @param bool $whitelist
     * @return \Generator
     */
    public function handle(?array $filter = null, bool $whitelist = true): \Generator
    {
        $path = \Omega\FaultManager\Fault::getCompilePath();
        $files = $this->filesystem->listContents();

        foreach ($files as $file) {
            // Check if the extension is php
            if (0 !== \strcmp('php', $file['extension'])) {
                continue;
            }

            // check for proper file name
            $len = \strlen(IFaultManagerException::EXCEPTION_CLASS_END);
            if (IFaultManagerException::EXCEPTION_CLASS_END !== \substr($file['filename'], -$len)) {
                continue;
            }

            // If filter is set, then process filter
            if (null !== $filter) {
                // by default we process those that are in $filter array
                if ($whitelist && !\in_array($file['filename'], $filter, true)) {
                    continue;
                }
                // if $whitelist is set to false, then we invert the processes
                if (!$whitelist && \in_array($file['filename'], $filter, true)) {
                    continue;
                }
            }

            yield $path . $file['path'];
        }
    }
}
