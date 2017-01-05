<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToItemnames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itemnames', function ($table) {

        $table->string('Category_Id')->after('Item_Model_No');
        $table->foreign('Category_Id')->references('id')->on('item__categories');  
            
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
            $table->dropColumn('Category_Id');

        
        });
    }
}
