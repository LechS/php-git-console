<?php

declare(strict_types=1);

namespace App\UI\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class CheckGitHashCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:check-git-hash';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = 'git ls-remote git://github.com/LechS/php-git-console.git master';

        $result = exec($command);


        $process = new Process(
            ['git','ls-remote', 'git://github.com/LechS/php-git-console.git', 'master']);
        $process->run();

        if(!$process->isSuccessful()) {
            $output->write($process->getErrorOutput());
        }

        $output->write($process->getOutput());
        return 0;
    }
}
