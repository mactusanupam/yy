<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaveinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('Leave_Type');
            $table->string('Leave_From');
            $table->string('Leave_To');
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
        Schema::drop('leaveinfos');
    }
}
