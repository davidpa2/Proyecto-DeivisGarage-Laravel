<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();

        DB::table("users")->insert(
            array(
                'id'                => 1,
                'nombre'              => 'David',
                'apellidos'         => 'Padilla',
                'email'             => 'david@gmail.com',
                'dni'               => '1234678A',
                'email_verified_at' => date('Y-m-d H:m:s'),
                'password'          => '$2y$10$hnQwdzRxObHwFjE9NOeJw.x6nORc0BseDaaOvskWzxki0hSrNzsIe',
                'tlf'               => $faker->e164PhoneNumber(),
                'rol_id'            => 1,
                'remember_token'    => "32inu434n98gn43h4h8gi",
                'created_at'        => date('Y-m-d H:m:s'),
                'updated_at'        => date('Y-m-d H:m:s')
            )
        );
    }
}
