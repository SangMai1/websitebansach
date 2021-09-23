<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models as Database;

class SachsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('sachs')->truncate();
        
        $sachs = [
            ['1', 'S', 'Muôn kiếp nhân sinh', 'D7oGF0i24d3vjH4S84ygeDEpk3k8tF6FON0L2uzQ.jpg', '1', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['2', 'S1', 'Chiến binh cầu vồng', '1kKAkZMEEuaEc3I2cPIf5PsaLHQiUdhbGCF9Jpmj.jpg', '1', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['3', 'S2', 'Bạn đắt giá bao nhiêu', 'waPSp8MuugMH9cO9g2UsW3BA3tnwADruvfCp2JKU.jpg', '8', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['4', 'S3', 'Người nam châm', 'rq2XOGSoeWXzpPldgPpKI1JtMk96l82GjilOGV2F.jpg', '3', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['5', 'S4', 'Người đua diều', 'dKJqmtBwZV61FG5CZYabdmZZieTvIzHqDUXMKILf.jpg', '4', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['6', 'S5', 'Đắc nhân tâm', 'QNMZjwE7zMJutPobrO0Fz8FgizUoBDstsFvG7lQw.png', '5', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['7', 'S6', 'Xách ba lô lên và đi', 'HEqr6sO2auQsdaPsRzPQduqhSJQaCaYzVCT29Dgb.jpg', '6', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['8', 'S7', 'Đọc vị bất kì ai', 'qY4n3IdNRZZcGAoDVuXRxune5Y0U8LvgLrje8Q65.jpg', '2', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['9', 'S8', 'Ba người thầy vĩ đại', 'VHXJjPWjQvi4eK59DLcUwymzyIN0dLrViWHNSh3q.jpg', '9', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null],
            ['10', 'S9', 'Hai số phận', 'NeK885stvKrTzgxlD9d1S6FBZe7c4kXAweAh6WZu.jpg', '6', '1', '1', '2021-09-20 08:37:14', '2021-09-20 08:37:14', null]

        ];
        
        foreach ($sachs as $sach) {
            Database\sachs::create([
                'id' => $sach[0],
                'code' => $sach[1],
                'name' => $sach[2],
                'file_path' => $sach[3],
                'id_danhmuc' => $sach[4],
                'create_by' => $sach[5],
                'update_by' => $sach[6],
                'created_at' => $sach[7],
                'updated_at' => $sach[8],
                'deleted_at' => $sach[9]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
