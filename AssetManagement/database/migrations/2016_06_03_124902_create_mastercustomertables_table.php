<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastercustomertablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastercustomertables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Customer_ID');
            $table->string('Customer_Name');
            $table->string('Customer_Address');
            $table->string('Customer_Contact');
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
        Schema::drop('mastercustomertables');
    }
}
