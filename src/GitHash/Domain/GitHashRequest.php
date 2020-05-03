<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

class GitHashRequest
{
    protected string $repository;

    protected string $branch;

    protected string $service;

    public function __construct(string $repository, string $branch, string $service)
    {
        $this->repository = $repository;
        $this->branch = $branch;
        $this->service = $service;
    }

    public function getRepository(): string
    {
        return $this->repository;
    }

    public function getBranch(): string
    {
        return $this->branch;
    }

    public function getService(): string
    {
        return $this->service;
    }
}
