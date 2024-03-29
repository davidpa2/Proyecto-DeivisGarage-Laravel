<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Client::factory(5)->create();
        if (config("app.env") === 'local') {
            $this->call([
                RolSeeder::class,
                UserSeeder::class,
            ]);
        }
    }
}
