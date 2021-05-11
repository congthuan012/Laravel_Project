<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLienhe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienhe', function (Blueprint $table) {
            $table->id();
            $table->integer('id_quan_tri');
            $table->string('email',255)->nullable();
            $table->string('ten',255)->nullable();
            $table->string('chu_de',255)->nullable();
            $table->longText('noi_dung')->nullable();
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
        Schema::table('lienhe', function (Blueprint $table) {
            //
        });
    }
}
