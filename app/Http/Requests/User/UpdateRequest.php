<?php

namespace App\Http\Requests\User;

use App\Rules\AlphaNumSpace;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['nullable', 'string', 'max:50', new AlphaNumSpace()],
            'email'     => ['nullable', 'string', 'max:100', 'email'],
            'password'  => ['required', 'string', 'max:32', 'password:api'],
        ];
    }
}
