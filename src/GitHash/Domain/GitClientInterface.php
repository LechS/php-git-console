<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

interface GitClientInterface
{
    public function getBranchHash(string $url, string $repository, string $branch);
}
