<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            
            $table->date('date_of_birth');
            $table->string('designation');
            $table->integer('joining_date');
            $table->integer('address');
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
        Schema::drop('empdetails');
    }
}
