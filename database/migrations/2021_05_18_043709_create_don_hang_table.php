<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->dateTime('ngay_dat')->nullable();
            $table->string('so_don_hang',500)->nullable();
            $table->integer('ma_kh')->nullable();
            $table->bigInteger('tong_tien')->nullable();
            $table->bigInteger('phi_ship')->nullable();
            $table->tinyInteger('trang_thai_don')->nullable();
            $table->tinyInteger('trang_thai')->nullable();
            $table->string('dia_chi',255)->nullable();
            $table->string('luu_y')->nullable();
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
        Schema::dropIfExists('don_hang');
    }
}
