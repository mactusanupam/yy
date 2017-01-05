<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActionLeadtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leadtables', function (Blueprint $table) {
            $table->string('Lead_Action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leadtables', function (Blueprint $table) {
            $table->dropColumn('Lead_Action');
        });
    }
}
