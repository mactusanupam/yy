<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventoryouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Project_Name');
            $table->string('Invoice_No');
            $table->string('Invoice_Value');
            $table->date('Invoice_Date');
            $table->string('Item');
            
            $table->string('Quantity');
            $table->string('Unit_Price');
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
        Schema::drop('inventoryouts');
    }
}
