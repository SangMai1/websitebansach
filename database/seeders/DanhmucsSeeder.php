<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models as Database;

class DanhmucsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('danhmucs')->truncate();
        
        $danhmucs = [
            ['1', 'DM', 'Tiểu thuyết', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['2', 'DM1', 'Kinh dị', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['3', 'DM2', 'Trinh thám', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['4', 'DM3', 'Anime', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['5', 'DM4', 'Hoạt hình', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['6', 'DM5', 'Lãng mạn', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['7', 'DM6', 'Hành động', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['8', 'DM7', 'Mùa xuân', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['9', 'DM8', 'Mùa thu', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
        ];
        
        foreach ($danhmucs as $danhmuc) {
            Database\danhmucs::create([
                'id' => $danhmuc[0],
                'code' => $danhmuc[1],
                'name' => $danhmuc[2],
                'create_by' => $danhmuc[3],
                'update_by' => $danhmuc[4],
                'created_at' => $danhmuc[5],
                'updated_at' => $danhmuc[6],
                'deleted_at' => $danhmuc[7]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
