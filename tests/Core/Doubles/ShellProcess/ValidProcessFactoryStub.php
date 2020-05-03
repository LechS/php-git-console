<?php

declare(strict_types=1);

namespace App\Tests\Core\Doubles\ShellProcess;

use App\Shared\ShellProcess\ShellProcessFactoryInterface;
use App\Shared\ShellProcess\ShellProcessInterface;

class ValidProcessFactoryStub implements ShellProcessFactoryInterface
{
    public function create(array $command): ShellProcessInterface
    {
        return new ValidProcessStub();
    }
}
