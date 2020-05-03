<?php

namespace App\Shared\ShellProcess;

interface ShellProcessFactoryInterface
{
    public function create(array $command): ShellProcessInterface;
}