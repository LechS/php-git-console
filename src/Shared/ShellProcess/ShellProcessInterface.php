<?php

declare(strict_types=1);

namespace App\Shared\ShellProcess;

interface ShellProcessInterface
{
    public function run();

    public function getErrorOutput();

    public function getOutput();

    public function isSuccessful();
}
