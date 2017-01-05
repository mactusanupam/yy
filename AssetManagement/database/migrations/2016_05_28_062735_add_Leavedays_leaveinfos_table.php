<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeavedaysLeaveinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leaveinfos', function (Blueprint $table) {
            $table->string('Leavedays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leaveinfos', function (Blueprint $table) {
            Schema::drop('leaveinfos');
        });
    }
}
