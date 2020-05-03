<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

interface GitClientInterface
{
    /**
     * @throws GitClientException
     */
    public function getBranchHash(GitHashRequest $gitHashRequest): GitHash;
}
