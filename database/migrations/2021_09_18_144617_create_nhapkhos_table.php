<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhapkhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhapkhos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->integer('id_sach');
            $table->integer('quantity');
            $table->bigInteger('price');
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
        Schema::dropIfExists('nhapkhos');
    }
}
