<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    protected $table = "tipo_habitaciones";

    public function acomodaciones()
    {
        return $this->belongsToMany(TipoAcomodacion::class, 'habitaciones_tipo_acomodaciones', 'tipo_habitacion_id', 'tipo_acomodacion_id');
    }

    public static function getTipos(){
        $rows = self::get();
        foreach ($rows as $row) {
            $tipos[] = ["value" => $row->id, "label" => $row->nombre];
        }
        return json_encode($tipos);
    }

    public static function getAcomodaciones($id){
        $acomodaciones = self::find($id)->acomodaciones;
        foreach ($acomodaciones as $row) {
            $tipos[] = ["value" => $row->id, "label" => $row->nombre];
        }
        return $tipos;
    }
}
