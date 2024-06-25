<?php

namespace Src\Shared\Services\Storage;

use Illuminate\Support\Facades\Storage;
use Src\Shared\Services\Storage\Enums\VisibilityLevelEnum;
use Src\Shared\Services\Storage\Contracts\StorageServiceManagement;

class StoreLocalDiskService implements StorageServiceManagement
{
    private VisibilityLevelEnum $visibilityLevel = VisibilityLevelEnum::PUBLIC;

    public function setVisibilityLevel(VisibilityLevelEnum $visibilityLevel): self
    {
        $this->visibilityLevel = $visibilityLevel;
        return $this;
    }

    public function store(string $path, string $content): bool
    {
        return Storage::disk('local')->put(
            $this->getPath($path),
            $content
        );
    }

    public function get(string $path): ?string
    {
        return Storage::disk('local')->get(
            $this->getPath($path)
        );
    }

    public function delete(string $path): void
    {
        Storage::disk('local')->delete(
            $this->getPath($path)
        );
    }

    private function getPath(string $path): string
    {
        return $this->visibilityLevel->value . '/' . $path;
    }
}
