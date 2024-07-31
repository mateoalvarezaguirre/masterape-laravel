<?php

namespace Src\Communication\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveContactRequest extends FormRequest
{
    protected $errorBag = 'saveContact';

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string',
            'email'   => 'required|email',
            'message' => 'required|string',
        ];
    }

    public function toArray(): array
    {
        return [
            'name'    => $this->input('name'),
            'email'   => $this->input('email'),
            'message' => $this->input('message'),
        ];
    }
}
