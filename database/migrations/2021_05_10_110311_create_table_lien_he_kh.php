<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLienHeKh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_lien_he_kh', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de',255)->nullable();
            $table->longText('noi_dung')->nullable();
            $table->integer('nguoi_tao')->nullable();
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
        Schema::dropIfExists('table_lien_he_kh');
    }
}
