<?php

use Illuminate\Database\Seeder;
use App\Models\TipoAcomodacion;
use App\Models\TipoHabitacion;
use App\Models\HabitacionTipoAcomodacion;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acomodaciones = collect([
            [
                "id" => 1,
                "nombre" => 'Sencilla',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 2,
                "nombre" => 'Doble',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 3,
                "nombre" => 'Triple',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 4,
                "nombre" => 'Cuadruple',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ]
        ])->toArray();

        TipoAcomodacion::insert($acomodaciones);

        $tipo_habitaciones = collect([
            [
                "id" => 1,
                "nombre" => 'Estandar',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 2,
                "nombre" => 'Junior',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 3,
                "nombre" => 'Suite',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ]
        ])->toArray();

        TipoHabitacion::insert($tipo_habitaciones);

        $habitaciones_acomodaciones = collect([
            [
                "tipo_habitacion_id" => 1,
                "tipo_acomodacion_id" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "tipo_habitacion_id" => 1,
                "tipo_acomodacion_id" => 2,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "tipo_habitacion_id" => 2,
                "tipo_acomodacion_id" => 3,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "tipo_habitacion_id" => 2,
                "tipo_acomodacion_id" => 4,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "tipo_habitacion_id" => 3,
                "tipo_acomodacion_id" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "tipo_habitacion_id" => 3,
                "tipo_acomodacion_id" => 2,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "tipo_habitacion_id" => 3,
                "tipo_acomodacion_id" => 3,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
        ])->toArray();
        HabitacionTipoAcomodacion::insert($habitaciones_acomodaciones);
    }
}
