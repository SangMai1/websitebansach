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
        $this->call(DanhmucsSeeder::class);
        $this->call(SlidesSeeder::class);
        $this->call(SachsSeeder::class);
        $this->call(NhapkhosSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ChucnangsSeeder::class);
        $this->call(UserandmissonsSeeder::class);
    }
}
