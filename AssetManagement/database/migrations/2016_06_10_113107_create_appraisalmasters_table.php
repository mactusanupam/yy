<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisalmasters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('User_Name');
            $table->string('Appraisal_ID');
            $table->string('Appraisal_period_start');
            $table->string('Appraisal_period_end');
            $table->string('Project_Name');
            $table->string('Goal1_Description');
            $table->string('Goal1_Start_Period');
            $table->string('Goal1_End_Period');
            $table->string('Goal2_Description');
            $table->string('Goal2_Start_Period');
            $table->string('Goal2_End_Period');
            $table->string('Goal3_Description');
            $table->string('Goal3_Start_Period');
            $table->string('Goal3_End_Period');
            $table->string('Goal4_Description');
            $table->string('Goal4_Start_Period');
            $table->string('Goal4_End_Period');
            $table->string('Self_Rating');
            $table->string('Manager_Rating');
            $table->string('Remarks');
            $table->string('Appraisal_Status');
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
        Schema::drop('appraisalmasters');
    }
}
