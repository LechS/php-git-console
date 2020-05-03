<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

use App\GitHash\Domain\Exception\GitClientException;

interface GitClientInterface
{
    /**
     * @throws GitClientException
     */
    public function getBranchHash(GitHashRequest $gitHashRequest): GitHash;
}
