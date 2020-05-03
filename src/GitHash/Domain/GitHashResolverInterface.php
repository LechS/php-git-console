<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

use App\GitHash\Domain\Exception\GitClientException;
use App\GitHash\Domain\Exception\GitServiceNotFoundException;

interface GitHashResolverInterface
{
    /**
     * @throws GitClientException
     * @throws GitServiceNotFoundException
     */
    public function getGitHash(string $repository, string $branch, string $service): string;
}
