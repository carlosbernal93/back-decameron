<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
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
        $id = $this->id != null ? $this->id : 0;
        return [
            'nit' => 'required|numeric|unique:hoteles,nit,'.$id,
            'nombre' => 'required',
            'ciudad_id' => 'required',
            'direccion' => 'required',
            'num_habitaciones' => 'required|numeric'

        ];
    }

    public function messages()
    {
        return [
            'nit.required' => 'El campo NIT es requerido',
            'nit.numeric' => 'El campo NIT debe ser numerico',
            'nit.unique' => 'Ya existe un Hotel con este NIT',
            'nombre.required'  => 'El nombre es requerido',
            'ciudad_id'=> 'La ciudad es requerida',
            'direccion.required' => ' La direccion es requerida',
            'num_habitaciones.required' => 'El campo # habitaciones es requerido',
            'num_habitaciones.numeric' => 'El campo # habitaciones debe ser numerico'
        ];
    }
}
