<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HabitacionesRequest;
use Illuminate\Http\Request;
use App\Models\HabitacionHotel;
use App\Models\Hotel;
use App\Models\TipoHabitacion;

class HabitacionesHotelController extends Controller
{
    public function index($id){
        $habitaciones = HabitacionHotel::where('hotel_id', $id)->get();
        return $habitaciones;
    }

    public function store(HabitacionesRequest $request){
        $habitacion = new HabitacionHotel;
        $result = $habitacion->saveData($request->only('cantidad','tipo_acomodacion_id', 'tipo_habitacion_id', 'hotel_id'));
        return response()->json([
            'status'=> 200,
            'message' => 'La habitación se creo con exito'
        ]);
    }

    public function show($id){
        $habitacion = HabitacionHotel::find($id);
        return $habitacion;
    }

    public function update(HabitacionesRequest $request, $id){
        $habitacion = HabitacionHotel::find($id);
        $result = $habitacion->saveData($request->only('cantidad','tipo_acomodacion_id', 'tipo_habitacion_id', 'hotel_id'));
        return response()->json([
            'status'=> 200,
            'message' => 'La habitación se creo con exito'
        ]);
    }

    public function destroy($id){
        $row = HabitacionHotel::find($id);
        $row->deleteData();
        return ($row->deleteData() ? $row : ["error" => "Error al eliminar"]);
    }

    public function getTipoHabitaciones(){
        $tipos_habitaciones = TipoHabitacion::getTipos();
        return $tipos_habitaciones;
    }

    public function getAcomodaciones($id){
        $tipos_acomodacion = TipoHabitacion::getAcomodaciones($id);
        return $tipos_acomodacion;
    }
}
