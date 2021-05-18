<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienHeKhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lien_he_kh', function (Blueprint $table) {
            $table->id();
            $table->string('chu_de')->nullable();
            $table->longText('noi_dung');
            $table->integer('nguoi_tao')->nullable();
            $table->tinyInteger('trang_thai');
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
        Schema::dropIfExists('lien_he_kh');
    }
}
