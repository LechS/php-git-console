<?php

declare(strict_types=1);

namespace App\Command\GitHash;

use App\GitHash\Domain\GitHashResolverInterface;
use App\GitHash\Infrastructure\GitServices;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CheckGitHashCommand extends Command
{
    protected static $defaultName = 'app:check-git-hash';

    protected GitHashResolverInterface $hashResolver;

    public function __construct(GitHashResolverInterface $hashResolver)
    {
        parent::__construct();

        $this->hashResolver = $hashResolver;
    }

    protected function configure(): void
    {
        $this->addArgument('repository', InputArgument::REQUIRED, 'Repository in format \' user\\repository \' ', );
        $this->addArgument('branch', InputArgument::REQUIRED, 'Branch name', );
        $this->addOption('service', 's', InputOption::VALUE_REQUIRED, 'Available services'.implode(PHP_EOL, GitServices::getAvailable()), GitServices::getDefault());
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $repository = $input->getArgument('repository');
        $branch = $input->getArgument('branch');
        $service = $input->getOption('service');

        $hash = $this->hashResolver->getGitHash($repository,$branch, $service);

        $output->writeln($hash);

        return 0;
    }

}
