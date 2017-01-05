<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventoryins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Project_Name');
            $table->string('invoice_no');
            $table->string('invoice_value');
            $table->date('invoice_date');
            $table->string('item');
            
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
        Schema::drop('inventoryins');
    }
}
