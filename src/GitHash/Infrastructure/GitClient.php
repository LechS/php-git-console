<?php

declare(strict_types=1);

namespace App\GitHash\Infrastructure;

use App\GitHash\Domain\GitClientException;
use App\GitHash\Domain\GitClientInterface;
use App\GitHash\Domain\GitHash;
use App\GitHash\Domain\GitHashRequest;
use App\Shared\ShellProcess\ShellProcessFactory;
use App\Shared\ShellProcess\ShellProcessInterface;

class GitClient implements GitClientInterface
{
    const TAB = '	';

    protected ShellProcessFactory $factory;

    public function __construct(ShellProcessFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    public function getBranchHash(GitHashRequest $gitHashRequest): GitHash
    {
        $process = $this->factory->create([
            'git',
            'ls-remote',
            'git://'.$gitHashRequest->getDomain().'/'.$gitHashRequest->getRepository().'.git',
            $gitHashRequest->getBranch(),
        ]);

        $process->run();

        $this->validate($process, $gitHashRequest);

        return new GitHash(
                    $this->parseHashResponse($process->getOutput()),
                    $gitHashRequest->getBranch()
                );
    }

    private function validate(ShellProcessInterface $process, GitHashRequest $gitHashRequest): void
    {
        if (!$process->isSuccessful() && false !== strpos($process->getErrorOutput(), 'Repository not found')) {
            throw new GitClientException('Repository not found');
        }

        if (!$process->isSuccessful()) {
            throw new GitClientException($this->parseErrorResponse($process->getErrorOutput()));
        }

        $response = $process->getOutput();

        if ('' === $response) {
            throw new GitClientException('Branch "'.$gitHashRequest->getBranch().'" not found');
        }
    }

    private function parseHashResponse(string $response): string
    {
        $separatorPosition = strpos($response, self::TAB);

        if (!is_int($separatorPosition)) {
            throw new \Exception('Incorrect git has response, separator not found');
        }

        return substr($response, 0, $separatorPosition);
    }

    private function parseErrorResponse(string $response): string
    {
        return str_replace(self::TAB, ' ', $response);
    }
}
