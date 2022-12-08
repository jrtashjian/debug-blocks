<?php

namespace DebugBlocks\Dependencies\Illuminate\Contracts\Container;

use Exception;
use DebugBlocks\Dependencies\Psr\Container\ContainerExceptionInterface;

class CircularDependencyException extends Exception implements ContainerExceptionInterface
{
    //
}
