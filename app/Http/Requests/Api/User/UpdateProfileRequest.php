<?php

namespace App\Http\Requests\Api\User;

use Dingo\Api\Exception\UpdateResourceFailedException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'                  => 'sometimes|required',
            'email'                 => 'sometimes|required|email|unique:users,email,'. $this->user()->id,
            'photo'                 => 'sometimes|required|image'
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new UpdateResourceFailedException('Could not update user.', $validator->errors());
    }
}
