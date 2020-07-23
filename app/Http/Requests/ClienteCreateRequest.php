<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteCreateRequest extends FormRequest
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
      $placa = (isset($this->placa) && !$this->placa[0]) ? 'required' : '';
      $marca = (isset($this->marca_id) && !$this->marca_id[0]) ? 'required' : '';
      $tipo = (isset($this->tipo_id) && !$this->tipo_id[0]) ? 'required' : '';
      return [
        'nombres' => 'required',
        'tipo_documento_id' => 'required',
        'documento' => 'required|numeric|unique:clientes',
        'placa[]' => $placa,
        'marca_id[]' => $marca,
        'tipo_id[]' => $tipo,
      ];
    }

    public function messages()
    {
      return [
        'nombres.required' => 'El nombre es requerido',
        'tipo_documento_id.required' => 'El tipo de documento es requerido',
        'documento.required' => 'El documento es requerido',
        'documento.numeric' => 'El formato del documento no es valido, debe ser un numero',
        'documento.unique' => 'El documento ya se encuentra registrado',
        'marca_id[].required' => 'La marca es requerida',
        'tipo_id[].required' => 'El tipo de vehiculo es requerido',
        'placa[].required' => 'La placa es requerida',
      ];
    }
}
