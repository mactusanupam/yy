<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailableLeavetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leaveinfos', function (Blueprint $table) {
            $table->string('Available_Leave');
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
            $table->dropColumn('Available_Leave');
        });
    }
}
