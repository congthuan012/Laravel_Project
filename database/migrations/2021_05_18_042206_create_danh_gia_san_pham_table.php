<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaSanPhamTable extends Migration
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
            $table->integer('san_pham_id')->nullable();
            $table->string('danh_gia')->nullable();
            $table->integer('nguoi_dung_id')->nullable();
            $table->integer('tra_loi')->nullable();
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
        Schema::dropIfExists('danh_gia_san_pham');
    }
}
