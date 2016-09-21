<?php

namespace App\Http\Requests\Backend\Access\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ManageUserRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
