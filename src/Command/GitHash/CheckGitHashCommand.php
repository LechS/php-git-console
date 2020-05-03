<?php

declare(strict_types=1);

namespace App\Command\GitHash;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class CheckGitHashCommand extends Command
{
    protected static $defaultName = 'app:check-git-hash';

    protected function configure(): void
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $process = new Process(
            ['git', 'ls-remote', 'git://github.com/LechS/php-git-console.git', 'master']);
        $process->run();

        if (!$process->isSuccessful()) {
            $output->write($process->getErrorOutput());

            return 1;
        }
        $output->write($process->getCommandLine());
        $output->write(PHP_EOL);

        return 0;
    }
}