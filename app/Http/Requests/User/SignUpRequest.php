<?php

namespace App\Http\Requests\User;

use App\Rules\AlphaNumSpace;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'string', 'max:50', new AlphaNumSpace()],
            'email'     => ['required', 'string', 'max:100', 'email', 'unique:App\Models\UserModel,email'],
            'password'  => ['required', 'string', 'max:32', 'alphanum', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'max:32', 'alphanum'],
        ];
    }
}
