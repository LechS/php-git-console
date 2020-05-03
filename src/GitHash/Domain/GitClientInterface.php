<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

interface GitClientInterface
{
    public function getBranchHash(string $domain, string $repository, string $branch): string;
}
