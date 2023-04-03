<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitacionHotel extends Model
{
    protected $table = "habitaciones_hotel";
    protected $appends = ['nombre_hotel', 'nombre_acomodacion', 'nombre_habitacion'];
    public $guarded =  ['id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function tipo_acomodacion()
    {
        return $this->belongsTo(TipoAcomodacion::class, "tipo_acomodacion_id", "id");
    }

    public function tipo_habitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, "tipo_habitacion_id", "id");
    }

    public function getNombreHotelAttribute()
    {
        return $this->hotel->nombre;
    }

    public function getNombreAcomodacionAttribute()
    {
        return $this->tipo_acomodacion->nombre;
    }

    public function getNombreHabitacionAttribute()
    {
        return $this->tipo_habitacion->nombre;
    }

    public function saveData($data){
        \DB::beginTransaction();
        try {
            $this->fill($data)->save();
            \DB::commit();
            return true;
        }catch(\Throwable $e){
            \DB::rollback();
            return false;
        }
    }

    public function deleteData()
    {
        \DB::beginTransaction();
        try {
            $this->delete();
            \DB::commit();
            return true;
        }catch(\Throwable $e){
            \DB::rollback();
            return false;
        }
    }
}
