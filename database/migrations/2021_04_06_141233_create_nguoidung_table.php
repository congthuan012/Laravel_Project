<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('quyen')->default('nguoi_dung');
            $table->string('vaitro')->default('Người dùng');
            $table->string('sdt')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('kichhoat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nguoidung', function (Blueprint $table) {
            //
        });
    }
}
