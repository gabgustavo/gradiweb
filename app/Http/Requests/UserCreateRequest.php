<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
      'nombres' => 'required',
      'email' => 'required|email|unique:users',
      'password'=>  'required|min:6' ,
      'password_confirmation'=> 'required|same:password',
      'estado' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'nombres.required'=> 'El nombre es requerido.',
      'email.required'=> 'El email es requerido.',
      'email.email'=> 'El email no es valido.',
      'email.unique'=> 'El email no esta disponible.',
      'password.required'=> 'La contraseña es requerida.',
      'password.min'=> 'La contraseña debe tener minimo 6 caracteres.',
      'password_confirmation.required'=> 'La confirmación de la contraseña es requerida.',
      'password_confirmation.same'=> 'La confirmación de la contraseña esta errada.',
      'estado.required'=> 'El estado del usuario es requerido.',
    ];
  }
}
