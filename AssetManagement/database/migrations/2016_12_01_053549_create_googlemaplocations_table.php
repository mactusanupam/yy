<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGooglemaplocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('googlemaplocations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Place_name');
            $table->double('Latitude',15,8);
            $table->double('Longitude',15,8);
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
        Schema::drop('googlemaplocations');
    }
}
