<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

class GitHashRequest
{
    protected string $domain;

    protected string $repository;

    protected string $branch;

    public function __construct(string $domain, string $repository, string $branch)
    {
        $this->domain = $domain;
        $this->repository = $repository;
        $this->branch = $branch;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getRepository(): string
    {
        return $this->repository;
    }

    public function getBranch(): string
    {
        return $this->branch;
    }
}
