<?php

namespace Src\Shared\Services\Storage\Contracts;

use Src\Shared\Services\Storage\Enums\VisibilityLevelEnum;

interface StorageServiceManagement
{
    public function setVisibilityLevel(VisibilityLevelEnum $visibilityLevel): self;

    public function store(string $path, string $content): bool;

    public function get(string $path): ?string;

    public function delete(string $path): void;
}
