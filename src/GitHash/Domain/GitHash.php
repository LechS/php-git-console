<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

class GitHash
{
    protected string $hash;

    protected string $branch;

    protected \DateTimeInterface $dateTime;

    public function __construct(string $hash, string $branch)
    {
        $this->hash = $hash;
        $this->branch = $branch;
        $this->dateTime = new \DateTime();
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getBranch(): string
    {
        return $this->branch;
    }

    public function getDateTime(): \DateTimeInterface
    {
        return $this->dateTime;
    }
}
