<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majelis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_majelis');
            $table->string('email_majelis');
            $table->string('wa_majelis');
            $table->string('pengurus_majelis');
            $table->string('alamat_majelis');
            $table->string('sejarah_majelis');
            $table->string('layanan_majelis');
             $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('majelis');
    }
}
