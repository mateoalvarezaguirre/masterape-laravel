<?php

namespace Src\Shared\ValueObjects;

class Image
{
    private ?string $name = null;
    public function __construct(
        private readonly string $content,
        private readonly string $extension
    ) {}

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }
}
