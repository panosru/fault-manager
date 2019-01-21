<?php
declare(strict_types=1);

/**
 * Author: panosru
 * Date: 2019-01-13
 * Time: 11:32
 */

namespace Omega\FaultManager\Traits;

use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflection\ReflectionClass;
use PhpParser\PrettyPrinter\Standard as CodePrinter;
use Roave\BetterReflection\Reflector\ClassReflector;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\ComposerSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\PhpInternalSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SingleFileSourceLocator;

/**
 * Trait FaultReflector
 * @package Omega\FaultManager\Traits
 * @codeCoverageIgnore
 */
trait FaultReflector
{
    /**
     * @param string $className
     * @return ReflectionClass
     */
    protected static function reflectFromClassName(string $className): ReflectionClass
    {
        return (new BetterReflection())->classReflector()->reflect($className);
    }

    /**
     * @param string $path
     * @return ReflectionClass
     */
    protected static function reflectFromFile(string $path): ReflectionClass
    {
        $astLocator = (new BetterReflection())->astLocator();
        $reflector = new ClassReflector(new AggregateSourceLocator([
            new SingleFileSourceLocator($path, $astLocator),
            new ComposerSourceLocator((require __DIR__ . '/../../vendor/autoload.php'), $astLocator),
            new PhpInternalSourceLocator($astLocator)
        ]));
        $className = $reflector->getAllClasses()[0]->getName();
        /** @var ReflectionClass $reflection */
        $reflection = $reflector->reflect($className);

        self::loadClass($reflection);

        return $reflection;
    }

    /**
     * @param ReflectionClass $reflection
     */
    private static function loadClass(ReflectionClass $reflection): void
    {
        eval((new CodePrinter())->prettyPrint([$reflection->getAst()]));
    }
}
