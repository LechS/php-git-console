<?php

declare(strict_types=1);

namespace App\Tests\Core\Application;

use App\GitHash\Application\GitHashResolver;
use App\GitHash\Domain\GitServiceNotFoundException;
use App\GitHash\Infrastructure\GitServices;
use App\Tests\Core\Doubles\GitValidClientStub;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GitHashResolverTest extends KernelTestCase
{
    private const REPOSITORY = 'LechS/php-git-console';
    private const BRANCH = 'master';
    private const SERVICE = 'github';

    protected GitHashResolver $hashResolver;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();
        $container = self::$kernel->getContainer();

        $this->hashResolver = new GitHashResolver(
            new GitValidClientStub(),
            $container->get('test.'.GitServices::class)
        );
    }

    public function testValidService(): void
    {
        $hash = $this->hashResolver->getGitHash(self::REPOSITORY, self::BRANCH, self::SERVICE);

        self::assertIsString($hash);
        self::assertEquals(GitValidClientStub::HASH, $hash);
    }

    public function testInValidService(): void
    {
        $this->expectException(GitServiceNotFoundException::class);
        $this->expectExceptionMessage('Service invalidService is not configured');

        $this->hashResolver->getGitHash(self::REPOSITORY, self::BRANCH, 'invalidService');
    }
}
