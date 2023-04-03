<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\HabitacionHotel;
use App\Models\Hotel;

class HabitacionesRequest extends FormRequest
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
        $id = $this->id != null ? $this->id : 0;
        return [
            'cantidad' => 'required|numeric',
            'tipo_acomodacion_id' => "required",
            'tipo_habitacion_id' => "required",

        ];
    }

    public function messages()
    {
        return [
            'num_habitaciones.required' => 'El campo cantidad es requerido',
            'num_habitaciones.numeric' => 'El campo cantidad debe ser numerico',
            'tipo_habitacion_id.required' => 'El campo NIT es requerido',
            'nit.numeric' => 'El campo NIT debe ser numerico',
            'tipo_acomodacion_id.unique' => 'Ya existe un tipo de acomodacion en el hotel',
            'nombre.required'  => 'El nombre es requerido'
        ];
    }

    public function withValidator($validator)
    {
        $id = $this->id;

        $cantHabitaciones = Hotel::find($this->hotel_id)->num_habitaciones;
        $habitaciones = HabitacionHotel::where(function ($query) use ($id){
            $query->where('hotel_id', $this->hotel_id);
            if($id != null){
                $query->where('id','<>', $id);
            }
        })->get();

        $validator->after(function ($validator) use($cantHabitaciones, $habitaciones, $id){
            if($cantHabitaciones < $habitaciones->sum("cantidad") + intVal($this->cantidad)){
                $validator->errors()->add('cantidad', 'La cantidad de habitaciones excede la establecida previamente en el hotel');
            }

            foreach ($habitaciones as $habitacion) {
                if($id != $habitacion->id &&  $this->tipo_acomodacion_id == $habitacion->tipo_acomodacion_id && $this->tipo_habitacion_id == $habitacion->tipo_habitacion_id){
                    $validator->errors()->add('tipo_acomodacion_id', 'Ya existe un tipo de acomodacion con el mismo tipo de habitacion en el hotel');
                    $validator->errors()->add('tipo_habitacion_id', 'Ya existe un tipo de habitacion con el mismo tipo de acomodacion en el hotel');
                }
            }
        });
    }
}
