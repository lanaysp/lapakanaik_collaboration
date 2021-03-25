<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledToSosmedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sosmeds', function (Blueprint $table) {
            $table->string('tw');
            $table->string('tt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sosmeds', function (Blueprint $table) {
            $table->dropColumn('tw');
            $table->dropColumn('tt');
        });
    }
}
