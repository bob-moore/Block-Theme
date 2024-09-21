<?php

declare (strict_types=1);
namespace Devkit\BlockTheme\Deps\DI;

use Devkit\BlockTheme\Deps\Psr\Container\ContainerExceptionInterface;
/**
 * Exception for the Container.
 */
class DependencyException extends \Exception implements ContainerExceptionInterface
{
}
