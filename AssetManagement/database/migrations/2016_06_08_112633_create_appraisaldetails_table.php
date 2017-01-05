<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisaldetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisaldetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Appraisal_ID');
            $table->string('Appraisal_period_start');
            $table->string('Appraisal_period_end');
            $table->string('Appraisal_status');
            $table->string('Goal_status');
            $table->string('Goal_Rating');
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
        Schema::drop('appraisaldetails');
    }
}
