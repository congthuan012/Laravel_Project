<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChucNangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuc_nang', function (Blueprint $table) {
            $table->id();
            $table->string('ten',100)->nullable();
            $table->string('lien_ket')->nullable();
            $table->tinyInteger('ma_cha')->nullable();
            $table->tinyInteger('hien_thi_menu')->default(1);
            $table->tinyInteger('trang_thai')->nullable();
            $table->tinyInteger('allow')->nullable(0);
            $table->string('icon',100)->nullable();
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
        Schema::dropIfExists('chuc_nang');
    }
}
