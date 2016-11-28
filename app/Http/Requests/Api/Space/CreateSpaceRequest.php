<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 24-Nov-16
 * Time: 11:01 PM
 */
namespace app\Http\Requests\Api\Space;

use Illuminate\Foundation\Http\FormRequest;

class CreateSpaceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
          'name'           =>'required',
          'type'           =>'required',
          'langittute'     =>'required',
          'lattitude'      =>'required',
        ];
    }
}