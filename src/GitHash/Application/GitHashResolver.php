<?php

declare(strict_types=1);

namespace App\GitHash\Application;

use App\GitHash\Domain\GitClientInterface;
use App\GitHash\Domain\GitHashRequest;
use App\GitHash\Domain\GitHashResolverInterface;
use App\GitHash\Domain\GitServicesInterface;

class GitHashResolver implements GitHashResolverInterface
{
    protected GitClientInterface $gitClient;
    protected GitServicesInterface $gitServices;

    public function __construct(
        GitClientInterface $gitClient,
        GitServicesInterface $gitServices
    ) {
        $this->gitClient = $gitClient;
        $this->gitServices = $gitServices;
    }

    public function getGitHash(string $repository, string $branch, string $service): string
    {
        $hashRequest = new GitHashRequest(
            $this->gitServices->getDomainByName($service),
            $repository,
            $branch
        );

        $gitHash = $this->gitClient->getBranchHash($hashRequest);

        return (string) $gitHash;
    }
}
