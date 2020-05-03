<?php

declare(strict_types=1);

namespace App\Tests\Core\Doubles\ShellProcess;

use App\GitHash\Infrastructure\GitClient;
use App\Shared\ShellProcess\ShellProcessInterface;

class ValidProcessStub implements ShellProcessInterface
{
    public const HASH = '29077d74b60607a60e9ccb1c4e2ec15e9f589586';

    public function run(): void
    {
    }

    public function getErrorOutput()
    {
    }

    public function getOutput()
    {
        return self::HASH.GitClient::TAB.'refs/heads/master';
    }

    public function isSuccessful()
    {
        return true;
    }
}
