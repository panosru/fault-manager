<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 23/04/2018
 * Time: 22:11
 */

namespace Omega\FaultManager\Traits;

use League\Flysystem\Filesystem;

trait FaultGenerator
{
    /** @var string */
    private static $compiledPath;

    /** @var Filesystem */
    private static $filesystem;

    /**
     * @param string $path
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     */
    public static function setCompilePath(string $path): void
    {
        if (\file_exists($path) && \is_dir($path) && \is_writable($path)) {
            self::$compiledPath = $path;
        } else {
            throw new \Omega\FaultManager\Exceptions\InvalidCompilePath($path);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getCompilePath(): string
    {
        return self::$compiledPath ?? \dirname(__DIR__, 2) . '/_compiled/';
    }

    /**
     * @return Filesystem
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     */
    private static function getFileSystem(): Filesystem
    {
        if (null === self::$filesystem) {
            try {
                self::$filesystem = new Filesystem(new \League\Flysystem\Adapter\Local(self::getCompilePath()));
            } catch (\LogicException $exception) {
                throw new \Omega\FaultManager\Exceptions\InvalidCompilePath(self::getCompilePath());
            }
        }

        return self::$filesystem;
    }

    /**
     * @param string $file
     * @param string $contents
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePath
     */
    private static function persistFile(string $file, string $contents): void
    {
        self::getFileSystem()->put(self::makeFileName($file), $contents);
    }

    /**
     * @param string $name
     * @return string
     */
    private static function makeFileName(string $name): string
    {
        return $name.'.php';
    }

    /**
     * @param string $name
     * @param string $extend
     * @return string
     */
    private static function generateFileCode(string $name, string $extend): string
    {
        return (\Zend\Code\Generator\FileGenerator::fromArray([
            'class' => (new \Zend\Code\Generator\ClassGenerator())
                ->setName($name)
                ->setExtendedClass($extend)
        ]))->generate();
    }
}
