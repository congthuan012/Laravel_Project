<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDanhGiaSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia_san_pham', function (Blueprint $table) {
            $table->id();
            $table->integer('san_pham_id');
            $table->string('danh_gia',255)->nullable();
            $table->integer('nguoi_dung_id')->nullable();
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
        Schema::dropIfExists('table_danh_gia_san_pham');
    }
}
