<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeemanagerrelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeemanagerrelationships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('primary_manager');
            $table->string('secondary_manager1');
            $table->string('secondary_manager2');
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
        Schema::drop('employeemanagerrelationships');
    }
}
