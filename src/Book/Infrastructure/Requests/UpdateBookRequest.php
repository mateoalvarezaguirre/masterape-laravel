<?php

namespace Src\Book\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Book\Application\DTO\BookDTO;

class UpdateBookRequest extends FormRequest
{
    protected $errorBag = 'createBook';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'            => 'required|string',
            'resume'           => 'required|string',
            'full_description' => 'required|string',
            'author_id'        => 'required|integer',
            'price'            => 'required|numeric',
            'is_featured'      => 'boolean',
            'cover'            => 'file',
            'hero'             => 'file',
        ];
    }

    public function dto(int $bookId): BookDTO
    {
        $dto = BookDTO::fromRequest($this);

        $dto->setId($bookId);

        return $dto;
    }
}
