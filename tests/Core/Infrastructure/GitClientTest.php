<?php

declare(strict_types=1);

namespace App\Tests\Core\Infrastructure;

use App\GitHash\Domain\GitClientException;
use App\GitHash\Domain\GitHashRequest;
use App\GitHash\Infrastructure\GitClient;
use App\Tests\Core\Doubles\ShellProcess\NoBranchProcessFactoryStub;
use App\Tests\Core\Doubles\ShellProcess\NoRepositoryProcessFactoryStub;
use App\Tests\Core\Doubles\ShellProcess\ValidProcessFactoryStub;
use App\Tests\Core\Doubles\ShellProcess\ValidProcessStub;
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
        $gitClient = new GitClient(new ValidProcessFactoryStub());

        $hash = $gitClient->getBranchHash($this->createHashRequest());

        self::assertEquals(ValidProcessStub::HASH, $hash);
    }

    public function testNoBranchResponse(): void
    {
        $gitClient = new GitClient(new NoBranchProcessFactoryStub());

        $this->expectException(GitClientException::class);
        $this->expectExceptionMessage('Branch "master" not found');

        $gitClient->getBranchHash($this->createHashRequest());
    }

    public function testNoRepositoryResponse(): void
    {
        $gitClient = new GitClient(new NoRepositoryProcessFactoryStub());

        $this->expectException(GitClientException::class);
        $this->expectExceptionMessage('Repository: LechS/php-git-console not found');

        $gitClient->getBranchHash($this->createHashRequest());
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
