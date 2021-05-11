<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDanhGiaBaiViet extends Migration
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
            $table->integer('bai_viet_id');
            $table->string('noi_dung',255)->nullable();
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
        Schema::dropIfExists('table_danh_gia_bai_viet');
    }
}
