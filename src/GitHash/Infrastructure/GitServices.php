<?php

declare(strict_types=1);

namespace App\GitHash\Infrastructure;

use App\GitHash\Domain\GitServiceNotFoundException;
use App\GitHash\Domain\GitServicesInterface;

class GitServices implements GitServicesInterface
{
    private const GITHUB = 'github';

    private const AVAILABLE_SERVICES = [
        self::GITHUB => 'github.com',
    ];

    public function getDomainByName(string $name): string
    {
        if (self::AVAILABLE_SERVICES[$name] ?? false) {
            return self::AVAILABLE_SERVICES[$name];
        }

        throw new GitServiceNotFoundException("Service $name is not configured");
    }

    public static function getDefault(): string
    {
        return self::GITHUB;
    }

    public static function getAvailable(): array
    {
        return array_keys(self::AVAILABLE_SERVICES);
    }
}
