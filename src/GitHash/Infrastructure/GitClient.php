<?php

declare(strict_types=1);

namespace App\GitHash\Infrastructure;

use App\GitHash\Domain\GitClientException;
use App\GitHash\Domain\GitClientInterface;
use Symfony\Component\Process\Process;

class GitClient implements GitClientInterface
{
    const SHELL_RESPONSE_SEPERATOR = '	';

    public function getBranchHash(string $domain, string $repository, string $branch): string
    {
        $process = new Process([
            'git',
            'ls-remote',
            'git://'.$domain.'/'.$repository.'git',
            $branch,
        ]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new GitClientException($this->parseErrorResponse($process->getErrorOutput()));
        }

        return $this->parseHashResponse($process->getOutput());
    }

    private function parseHashResponse(string $response): string
    {
        $separatorPosition = strpos($response, self::SHELL_RESPONSE_SEPERATOR);

        if (!is_int($separatorPosition)) {
            throw new \Exception('Incorrect git has response, separator not found');
        }

        return substr($response, 0, $separatorPosition);
    }

    private function parseErrorResponse(string $response): string
    {
        return str_replace(self::SHELL_RESPONSE_SEPERATOR, PHP_EOL, $response);
    }
}
