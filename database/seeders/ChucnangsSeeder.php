<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models as Database;

class ChucnangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('chucnangs')->truncate();
        
        $chucnangs = [
            ['1', 'CN', 'Danh sách sách', 'books.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['2', 'CN1', 'Xóa sách', 'books.delete', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['3', 'CN2', 'Cập nhật sách', 'books.edit', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['4', 'CN3', 'Thêm mới sách', 'books.create', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['5', 'CN4', 'Danh sách danh mục', 'categories.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['6', 'CN5', 'Xóa danh mục', 'categories.delete', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['7', 'CN6', 'Cập nhật danh mục', 'categories.edit', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['8', 'CN7', 'Thêm mới danh mục', 'categories.create', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['9', 'CN8', 'Danh sách nhân sự', 'user.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['10', 'CN9', 'Xóa nhân sự', 'user.delete', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['11', 'CN10', 'Cập nhật nhân sự', 'user.edit', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['12', 'CN11', 'Thêm mới nhân sự', 'user.create', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['13', 'CN12', 'Danh sách chức năng', 'mission.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['14', 'CN13', 'Xóa chức năng', 'mission.delete', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['15', 'CN14', 'Cập nhật chức năng', 'mission.edit', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['16', 'CN15', 'Thêm mới chức năng', 'mission.create', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['17', 'CN16', 'Danh sách slide', 'slides.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['18', 'CN17', 'Xóa slide', 'slides.delete', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['19', 'CN18', 'Cập nhật slide', 'slides.edit', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['20', 'CN19', 'Thêm mới slide', 'slides.create', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['21', 'CN20', 'Quản lý đơn hàng', 'orderadmin.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['22', 'CN21', 'Quản lý nhập kho', 'warehouse.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['23', 'CN22', 'Quản lý khách hàng', 'customer.list', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
            ['24', 'CN23', 'Quản lý bình luận', 'review.getlist', '1', '1', '2021-07-06 08:20:55', '2021-07-06 08:20:55', null],
        ];
        
        foreach ($chucnangs as $chucnang) {
            Database\chucnangs::create([
                'id' => $chucnang[0],
                'code' => $chucnang[1],
                'name' => $chucnang[2],
                'route'=> $chucnang[3],
                'create_by' => $chucnang[4],
                'update_by' => $chucnang[5],
                'created_at' => $chucnang[6],
                'updated_at' => $chucnang[7],
                'deleted_at' => $chucnang[8]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
