<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->nullable();
            $table->bigInteger('gia')->nullable();
            $table->string('mo_ta')->nullable();
            $table->string('hinh_dai_dien')->nullable();
            $table->string('video')->nullable();
            $table->integer('ma_nha_cung_cap')->nullable();
            $table->integer('ma_loai')->nullable();
            $table->integer('hinh_chi_tiet')->nullable();
            $table->longText('mo_ta_chi_tiet')->nullable();
            $table->string('ma_vach')->nullable();
            $table->string('tieu_de')->nullable();
            $table->string('tu_khoa')->nullable();
            $table->string('mo_ta_tim_kiem',255)->nullable();
            $table->string('hinh_chia_se')->nullable();
            $table->string('ten_rut_gon')->nullable();
            $table->tinyInteger('trang_thai')->nullable();
            $table->integer('so_luong')->nullable();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
