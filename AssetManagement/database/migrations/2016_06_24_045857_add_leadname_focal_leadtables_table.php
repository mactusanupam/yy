<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeadnameFocalLeadtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leadtables', function (Blueprint $table) {
            $table->string('User_Name');
            $table->string('Lead_Name');
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
             $table->dropColumn('User_Name');
             $table->dropColumn('Lead_Name');
        });
    }
}
