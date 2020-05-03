<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

interface GitHashResolverInterface
{
    public function resolve(GitHashRequest $gitHashRequest): GitHash;
}
