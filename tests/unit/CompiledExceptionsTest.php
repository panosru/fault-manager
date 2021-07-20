<?php

/**
 * Author: panosru
 * Date: 24/04/2018
 * Time: 17:05
 */

declare(strict_types=1);

namespace Omega\FaultManagerTests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Omega\FaultManager\Fault;
use Omega\FaultManager\Plugins\CompiledExceptions;
use PHPUnit\Framework\TestCase;

/**
 * Class CompiledExceptionsTest
 * @package Omega\FaultManagerTests
 * @coversDefaultClass \Omega\FaultManager\Plugins\CompiledExceptions
 */
class CompiledExceptionsTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @test
     * @covers ::setFilesystem()
     */
    public function setInvalidFilesystem(): void
    {
        $this->expectException(\TypeError::class);

        (new CompiledExceptions())->setFilesystem(new \stdClass());
    }

    /**
     * @test
     * @covers ::setFilesystem()
     */
    public function setValidFilesystem(): void
    {
        $stub = new CompiledExceptions();

        $stub->setFilesystem(
            \Mockery::mock(\League\Flysystem\FilesystemInterface::class)->makePartial()
        );

        $filesystem = (new \ReflectionObject($stub))->getProperty('filesystem');
        $filesystem->setAccessible(true);
        $filesystem = $filesystem->getValue($stub);

        self::assertInstanceOf(\League\Flysystem\FilesystemInterface::class, $filesystem);
    }

    /**
     * @test
     * @covers ::getMethod()
     */
    public function checkIfMethodNameIsValid(): void
    {
        self::assertEquals('compiledExceptions', (new CompiledExceptions())->getMethod());
    }

    /**
     * @test
     * @covers ::handle()
     */
    public function listContentsIsCalled(): void
    {
        $stub = new CompiledExceptions();

        $mock = \Mockery::mock(\League\Flysystem\FilesystemInterface::class)->makePartial();

        $stub->setFilesystem($mock);

        $returns = [
            [
                'extension' => 'php',
                'filename' => 'MockTestException',
                'path' => 'MockTestException.php'
            ],
            [
                'extension' => 'php',
                'filename' => 'FooTestException',
                'path' => 'FooTestException.php'
            ],
            [
                'extension' => 'invalid'
            ]
        ];

        $mock->shouldReceive('listContents')
            ->once()
            ->andReturn($returns);

        $files = $stub->handle();

        while ($file = $files->current()) {
            self::assertEquals(Fault::compilePath() . $returns[$files->key()]['path'], $file);
            $files->next();
        }
    }

    /**
     * @test
     * @covers ::handle()
     */
    public function returnFiltered(): void
    {
        $stub = new CompiledExceptions();

        $mock = \Mockery::mock(\League\Flysystem\FilesystemInterface::class)->makePartial();

        $stub->setFilesystem($mock);


        $returns = [
            [
                'extension' => 'php',
                'filename' => 'MockTestException',
                'path' => 'MockTestException.php'
            ],
            [
                'extension' => 'php',
                'filename' => 'FooTestException',
                'path' => 'FooTestException.php'
            ]
        ];

        $mock->shouldReceive('listContents')
            ->twice()
            ->andReturn($returns);

        $files = $stub->handle(['FooTestException', 'NotDefinedException']);

        $counter = 0;
        while ($file = $files->current()) {
            $counter++;
            self::assertEquals(Fault::compilePath() . $returns[1]['path'], $file);
            $files->next();
        }
        self::assertEquals(1, $counter);


        $files = $stub->handle(['FooTestException'], $stub::RETURN_NOT_IN_ARRAY);

        $counter = 0;
        while ($file = $files->current()) {
            $counter++;
            self::assertEquals(Fault::compilePath() . $returns[0]['path'], $file);
            $files->next();
        }
        self::assertEquals(1, $counter);
    }
}
