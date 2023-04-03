<?php

use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudades = collect([
            [
                "id" => 1,
                "nombre" => 'Bogota',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 2,
                "nombre" => 'Medellin',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 3,
                "nombre" => 'Cartagena',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 4,
                "nombre" => 'Cali',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 5,
                "nombre" => 'Barranquilla',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ]
        ])->toArray();

        Ciudad::insert($ciudades);
    }
}
