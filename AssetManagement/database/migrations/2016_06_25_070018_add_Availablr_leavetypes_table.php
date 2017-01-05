<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailablrLeavetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leavetypes', function (Blueprint $table) {
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
        Schema::table('leavetypes', function (Blueprint $table) {
           $table->dropColumn('Available_Leave');
        });
    }
}
