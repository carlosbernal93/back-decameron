<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";

    public static function getCiudades(){
        $rows = self::get();
        foreach ($rows as $row) {
            $ciudades[] = ["value" => $row->id, "label" => $row->nombre];
        }
        return json_encode($ciudades);
    }
}
