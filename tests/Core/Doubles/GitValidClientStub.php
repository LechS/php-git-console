<?php

declare(strict_types=1);

namespace App\Tests\Core\Doubles;

use App\GitHash\Domain\GitClientInterface;
use App\GitHash\Domain\GitHash;
use App\GitHash\Domain\GitHashRequest;

class GitValidClientStub implements GitClientInterface
{
    public const HASH = '29077d74b60607a60e9ccb1c4e2ec15e9f589586';

    public function getBranchHash(GitHashRequest $gitHashRequest): GitHash
    {
        return new GitHash(
            self::HASH,
            $gitHashRequest->getBranch()
        );
    }
}