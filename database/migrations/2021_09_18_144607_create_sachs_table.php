<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sachs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('file_path');
            $table->integer('id_danhmuc');
            $table->string('create_by');
            $table->string('update_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sachs');
    }
}
