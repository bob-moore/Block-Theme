<?php

declare (strict_types=1);
namespace Devkit\BlockTheme\Deps\DI;

use Devkit\BlockTheme\Deps\Psr\Container\NotFoundExceptionInterface;
/**
 * Exception thrown when a class or a value is not found in the container.
 */
class NotFoundException extends \Exception implements NotFoundExceptionInterface
{
}
