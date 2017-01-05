<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemModelNoToItemnames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itemnames', function ($table) {
            $table->string('Item_Model_No')->after('Item_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itemnames', function ($table) {
            $table->dropColumn('Item_Model_No');

        
        });
    }
}
