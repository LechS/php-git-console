<?php

declare(strict_types=1);

namespace App\Tests\Core\Doubles\ShellProcess;

use App\Shared\ShellProcess\ShellProcessInterface;

class NoRepositoryProcessStub implements ShellProcessInterface
{
    public function run(): void
    {
    }

    public function getErrorOutput()
    {
        return "fatal: remote error: \n
                Repository not found.\n
                ";
    }

    public function getOutput()
    {
    }

    public function isSuccessful()
    {
        return false;
    }
}
