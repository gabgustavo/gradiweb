<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSettingCreateRequest extends FormRequest
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
          'host'=> 'required',
          'username'=> 'required',
        ];
    }

  public function messages()
  {
    return [
      'host.required'=> 'El host es requerido.',
      'username.required'=> 'El username es requerido.',
    ];
  }
}
