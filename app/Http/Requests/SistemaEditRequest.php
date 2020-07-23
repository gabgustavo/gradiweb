<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SistemaEditRequest extends FormRequest
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
      $from = ($this->from) ? 'email' : '';
        return [
          'nombre' => 'required',
          'from' => $from
        ];
    }

  public function messages()
  {
    return [
      'nombre.required'=> 'El nombre del sistio es requerido.',
      'from.email'=> 'El campo remitente de los correos debe ser un email valido.',
    ];
  }
}
