<?php

namespace App\Http\Requests;

/**
 * Autor: Luis Gustavo Avila B.
 * Email: gustavoavilabar@gmail.com
 * Fecha: 2020-03
 * Nombre del sistemas: FManager
 */

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'user' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'captcha'
        ];
    }

  public function messages()
  {
    return [
      'user.required'=> 'El usuario es requerido.',
      'password.required'=> 'La contraseña es requerida.',
      'g-recaptcha-response.captcha'=> 'Error del captcha, intentelo nuevamente.',
    ];
  }
}
