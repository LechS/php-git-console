<?php

declare(strict_types=1);

namespace App\Shared\ShellProcess;

class ShellProcessFactory
{
    public function create(array $command): ShellProcessInterface
    {
        return new ShellProcess($command);
    }
}
