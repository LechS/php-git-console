<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

interface GitHashResolverInterface
{
    public function getGitHash(string $repository, string $branch, string $service): string;

}