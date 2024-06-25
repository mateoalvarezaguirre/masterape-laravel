<?php

namespace Src\Book\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Book\Application\DTO\GetAllBooksDTO;

class GetAllBooksRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page'  => 'integer',
            'limit' => 'integer',
        ];
    }

    public function dto(): GetAllBooksDTO
    {
        return new GetAllBooksDTO(
            $this->input('page') ?: 1
        );
    }
}
