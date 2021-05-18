<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuanBaiVietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luan_bai_viet', function (Blueprint $table) {
            $table->id();
            $table->integer('bai_viet_id')->nullable();
            $table->longText('noi_dung')->nullable();
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
        Schema::dropIfExists('binh_luan_bai_viet');
    }
}
