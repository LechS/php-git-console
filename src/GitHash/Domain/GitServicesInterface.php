<?php

declare(strict_types=1);

namespace App\GitHash\Domain;

interface GitServicesInterface
{
    /**
     * @throws GitServiceNotFoundException
     */
    public function getDomainByName(string $name): string;

    public static function getDefault(): string;

    /**
     * @return array|string[]
     */
    public static function getAvailable(): array;
}
