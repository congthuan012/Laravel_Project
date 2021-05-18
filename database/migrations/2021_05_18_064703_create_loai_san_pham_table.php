<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->nullable();
            $table->string('mo_ta',255)->nullable();
            $table->string('icon')->nullable();
            $table->integer('ma_cha')->nullable();
            $table->string('tieu_de',255)->nullable();
            $table->string('tu_khoa')->nullable();
            $table->string('mo_ta_tim_kiem',255)->nullable();
            $table->string('hinh_chia_se',255)->nullable();
            $table->string('ten_rut_gon')->nullable();
            $table->tinyInteger('trang_thai')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('loai_san_pham');
    }
}
