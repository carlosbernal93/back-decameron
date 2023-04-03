<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Ciudad;

class HotelController extends Controller
{
    public function index(){
        $hoteles = Hotel::all();
        return $hoteles;
    }

    public function store(HotelRequest $request){
        $hotel = new Hotel;
        $result = $hotel->saveData($request->only('nombre','nit', 'direccion', 'ciudad_id', 'num_habitaciones'));
        return response()->json([
            'status'=> 200,
            'message' => 'El hotel se creo con exito'
        ]);
    }

    public function show($id){
        $hotel = Hotel::find($id);
        return $hotel;
    }

    public function update(HotelRequest $request, $id){
        $hotel = Hotel::find($id);
        $result = $hotel->saveData($request->only('nombre','nit', 'direccion', 'ciudad_id', 'num_habitaciones'));
        return response()->json([
            'status'=> 200,
            'message' => 'El hotel se actualizo con exito'
        ]);
    }

    public function destroy($id){
        $row = Hotel::find($id);
        return ($row->deleteData() ? $row : ["error" => "Error al eliminar"]);
    }

    public function getCiudades(){
        $ciudades = Ciudad::getCiudades();
        return $ciudades;
    }
}
