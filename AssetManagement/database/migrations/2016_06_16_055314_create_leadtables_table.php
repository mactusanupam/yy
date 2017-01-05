<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leadtables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LeadUpdatedDateTime');
            $table->string('LeadID');
            $table->string('LeadDescription');
            $table->string('LeadProbability');
            $table->string('LeadEstimatedValue');
            $table->string('LeadEstimatedStartDate');
            $table->string('LeadStatus');
            $table->string('Customer_Name');
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
        Schema::drop('leadtables');
    }
}
