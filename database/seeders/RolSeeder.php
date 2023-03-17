<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();

        DB::table("roles")->insert(
            array(
                'id'          => 1,
                'tipo'        => 'Jefe',
                'descripcion' => 'El jefe del taller',
                'created_at'  => date('Y-m-d H:m:s'),
                'updated_at'  => date('Y-m-d H:m:s')
            )
        );
        DB::table("roles")->insert(
            array(
                'id'          => 2,
                'tipo'        => 'Mecánico',
                'descripcion' => 'Un trabajador más',
                'created_at'  => date('Y-m-d H:m:s'),
                'updated_at'  => date('Y-m-d H:m:s')
            )
        );
    }
}
