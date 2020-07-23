<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
      $pass = ($this->password) ? 'min:6' : '';
      $pass_conf = ($this->password) ? 'required|same:password' : '';
      //dd($this->input('url'));
      return [
        'nombres' => 'required',
        'email' => 'required|email|unique:users,email,'.$this->id,
        'password'=>  $pass ,
        'password_confirmation'=> $pass_conf,
      ];
    }

  public function messages()
  {
    return [
      'nombre.required'=> 'El nombre es requerido.',
      'apellido.required'=> 'El apellido es requerido.',
      'email.required'=> 'El email es requerido.',
      'email.email'=> 'El email no es valido.',
      'email.unique'=> 'El email no esta disponible.',
      'password.min'=> 'La contraseña debe tener minimo 6 caracteres.',
      'password_confirmation.required'=> 'La confirmación de la contraseña es requerida.',
      'password_confirmation.same'=> 'La confirmación de la contraseña esta errada.',
      'estado.required'=> 'El estado del usuario es requerido.',
    ];
  }
}
