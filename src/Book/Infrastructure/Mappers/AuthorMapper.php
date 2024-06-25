<?php

namespace Src\Book\Infrastructure\Mappers;

use App\Models\Author;
use Src\Book\Domain\Entities\AuthorEntity;

abstract class AuthorMapper
{
    public static function fromModelToEntity(Author $author): AuthorEntity
    {
        return new AuthorEntity(
            $author->id,
            $author->first_name,
            $author->last_name
        );
    }
}
