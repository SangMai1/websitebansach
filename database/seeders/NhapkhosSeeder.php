<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models as Database;

class NhapkhosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('nhapkhos')->truncate();
        
        $nhapkhos = [
            ['1', 'NK', '1', '40', '25000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['2', 'NK1', '2', '35', '20000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['3', 'NK2', '3', '40', '21000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['4', 'NK3', '4', '50', '43000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['5', 'NK4', '5', '34', '34000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['6', 'NK5', '6', '29', '29000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['7', 'NK6', '7', '32', '32000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['8', 'NK7', '8', '40', '40000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['9', 'NK8', '9', '10', '19000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['10', 'NK9', '10', '27', '27000', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null]

        ];
        
        foreach ($nhapkhos as $nhapkho) {
            Database\nhapkhos::create([
                'id' => $nhapkho[0],
                'code' => $nhapkho[1],
                'id_sach' => $nhapkho[2],
                'quantity' => $nhapkho[3],
                'price' => $nhapkho[4],
                'create_by' => $nhapkho[5],
                'update_by' => $nhapkho[6],
                'created_at' => $nhapkho[7],
                'updated_at' => $nhapkho[8],
                'deleted_at' => $nhapkho[9]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
