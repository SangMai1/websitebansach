<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models as Database;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        
        $users = [
            ['1', 'NV', 'Mai Văn Sang', 'vansang1532000@gmail.com', '$2y$10$93F9n/U.obouvC7ItK0O8O/cADKDJnEG/ltaHm.YoUYuPyQ0mU/Yy', '1', '2000-03-15', '01234567899', 'Quảng Nam', '012345678', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
        ];
        
        foreach ($users as $user) {
            Database\User::create([
                'id' => $user[0],
                'code' => $user[1],
                'name' => $user[2],
                'email' => $user[3],
                'password' => $user[4],
                'gender' => $user[5],
                'date_of_birth' => $user[6],
                'phone' => $user[7],
                'address' => $user[8],
                'cmnd' => $user[9],
                'create_by' => $user[10],
                'update_by' => $user[11],
                'created_at' => $user[12],
                'updated_at' => $user[13],
                'deleted_at' => $user[14]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
