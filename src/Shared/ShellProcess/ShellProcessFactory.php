<?php

declare(strict_types=1);

namespace App\Shared\ShellProcess;

class ShellProcessFactory implements ShellProcessFactoryInterface
{
    public function create(array $command): ShellProcessInterface
    {
        return new ShellProcess($command);
    }
}
