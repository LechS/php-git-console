<?php

declare(strict_types=1);

namespace App\Tests\Core\Infrastructure;

use App\GitHash\Domain\GitHashRequest;
use App\GitHash\Infrastructure\GitClient;
use App\Tests\Core\Doubles\ShellProcess\ShellValidProcessFactoryStub;
use App\Tests\Core\Doubles\ShellProcess\ShellValidProcessMock;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GitClientTest extends KernelTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
    }

    public function testValidResponse(): void
    {
        $gitClient = new GitClient(new ShellValidProcessFactoryStub());

        $hash = $gitClient->getBranchHash($this->createHashRequest());

        self::assertEquals(ShellValidProcessMock::HASH, $hash);
    }

    private function createHashRequest(): GitHashRequest
    {
        return new GitHashRequest(
            'gtihub.com',
            'LechS/php-git-console',
            'master'
        );
    }



}