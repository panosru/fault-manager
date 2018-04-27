<?php

declare(strict_types=1);

/**
 * Author: panosru
 * Date: 23/04/2018
 * Time: 22:11
 */

namespace Omega\FaultManager\Traits;

use League\Flysystem\Filesystem;

/**
 * Trait FaultGenerator
 * @package Omega\FaultManager\Traits
 */
trait FaultGenerator
{
    /** @var string */
    private static $compiledPath;

    /** @var Filesystem */
    private static $filesystem;

    /**
     * @param string $path
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     */
    public static function setCompilePath(string $path): void
    {
        // Add trailing slash in case is not present (the shortcut way)
        $path = \rtrim($path, \DIRECTORY_SEPARATOR) . \DIRECTORY_SEPARATOR;

        if (!(\file_exists($path) && \is_dir($path) && \is_writable($path))) {
            throw new \Omega\FaultManager\Exceptions\InvalidCompilePathException($path);

        }

        self::$compiledPath = $path;
        self::$filesystem->getAdapter()->setPathPrefix($path);
    }

    /**
     * {@inheritdoc}
     */
    public static function getCompilePath(): string
    {
        return self::$compiledPath ?? \dirname(__DIR__, 2) . '/_compiled/';
    }

    /**
     * {@inheritdoc}
     */
    public static function autoloadCompiledExceptions(): void
    {
        /** @var \Generator $files */

        $files = self::getFileSystem()->getCompiledExceptions();
        while ($file = $files->current()) {
            self::loadCustomException($file);
            $files->next();
        }
    }

    /**
     * @return Filesystem
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     */
    private static function getFileSystem(): Filesystem
    {
        if (null === self::$filesystem) {
            // That is trigger by autoloader, thus is not available for testing in unit tests
            // but that's not big of a deal since if it was faulty then nothing would work :P
            // @codeCoverageIgnoreStart
            try {
                self::$filesystem = new Filesystem(new \League\Flysystem\Adapter\Local(self::getCompilePath()));
                self::$filesystem->addPlugin(new \Omega\FaultManager\Plugins\CompiledExceptions());
            } catch (\LogicException $exception) {
                throw new \Omega\FaultManager\Exceptions\InvalidCompilePathException(self::getCompilePath());
            }
            // @codeCoverageIgnoreEnd
        }

        return self::$filesystem;
    }

    /**
     * @param string $file
     * @param string $contents
     * @throws \Omega\FaultManager\Exceptions\InvalidCompilePathException
     */
    private static function persistFile(string $file, string $contents): void
    {
        self::getFileSystem()->put(self::makeFileName($file), $contents);
    }

    /**
     * @param string $path
     */
    private static function loadCustomException(string $path): void
    {
        require_once $path;
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
