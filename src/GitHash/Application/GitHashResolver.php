<?php

declare(strict_types=1);

namespace App\GitHash\Application;

use App\GitHash\Domain\GitClientInterface;
use App\GitHash\Domain\GitHashResolverInterface;

class GitHashResolver implements GitHashResolverInterface
{
    protected GitClientInterface $gitClient;

    public function __construct(GitClientInterface $gitClient)
    {
        $this->gitClient = $gitClient;
    }


    public function getGitHash(string $repository, string $branch, string $service): string
    {
        // TODO: Implement getGitHash() method.
    }
}