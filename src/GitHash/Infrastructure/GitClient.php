<?php

declare(strict_types=1);

namespace App\GitHash\Infrastructure;

use App\GitHash\Domain\GitClientInterface;

class GitClient implements GitClientInterface
{
    public function getBranchHash(string $url, string $repository, string $branch)
    {
    }
}
