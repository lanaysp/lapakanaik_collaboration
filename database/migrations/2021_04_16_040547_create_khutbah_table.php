<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhutbahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khutbah', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('description');
            $table->string('photo');
            $table->string('slug');
            $table->integer('users_id');
            $table->integer('khutbahcategories_id');

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
        Schema::dropIfExists('khutbah');
    }
}
