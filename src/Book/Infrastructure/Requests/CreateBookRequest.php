<?php

namespace Src\Book\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Book\Application\DTO\BookDTO;
use Src\Shared\Helpers\FileHelper;
use Src\Shared\ValueObjects\Image;

class CreateBookRequest extends FormRequest
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
            'cover'            => 'required|file',
            'hero'             => 'required|file',
        ];
    }

    public function dto(): BookDTO
    {
        return BookDTO::fromRequest($this);
    }
}
