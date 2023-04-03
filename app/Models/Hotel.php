<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = "hoteles";
    protected $appends = ['nombre_ciudad'];

    public $guarded =  ['id'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function habitaciones()
    {
        return $this->hasMany(HabitacionHotel::class, "hotel_id", "id");
    }

    public function getNombreCiudadAttribute()
    {
        return $this->ciudad->nombre;
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
