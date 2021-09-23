<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models as Database;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('slides')->truncate();
        
        $slides = [
            ['1', 'SL', 'Slide 1', '9nSuYVBtNeHQXxrgd7e4Hi8BWof37XVmpjnUdkJF.webp', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['2', 'SL1', 'Slide 2', 'ouqblyfydoJ6l5xfNpWL6CbCt2xQkXr8UiqVyWzc.webp', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['3', 'SL2', 'Slide 3', 'gbMgSt3Jp8NuMIEDKRzZPU8hd57uzfRAQkLV0oOd.webp', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
        ];
        
        foreach ($slides as $slide) {
            Database\slides::create([
                'id' => $slide[0],
                'code' => $slide[1],
                'name' => $slide[2],
                'file_path' => $slide[3],
                'create_by' => $slide[4],
                'update_by' => $slide[5],
                'created_at' => $slide[6],
                'updated_at' => $slide[7],
                'deleted_at' => $slide[8]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
