<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_quyen', function (Blueprint $table) {
            $table->integer('ma_chuc_nang');
            $table->integer('ma_quan_tri');
            $table->primary(['ma_chuc_nang', 'ma_quan_tri']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phan_quyen');
    }
}
