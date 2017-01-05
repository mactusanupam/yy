<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeomaplocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geomaplocations', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('Latitude',20,17);
            $table->decimal('Longitude',20,17);
            $table->string('Place_name');
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
        Schema::drop('geomaplocations');
    }
}
