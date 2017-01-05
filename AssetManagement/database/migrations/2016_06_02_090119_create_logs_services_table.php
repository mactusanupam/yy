<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_services', function (Blueprint $table) {
             $table->increments('id');
            $table->string('Date_call_recieved');
            $table->string('Company_Name');
            $table->string('Site_Name');
            $table->string('Customer_name');
            $table->string('Problem_Description');
            $table->string('Service_Start');
            $table->string('Service_End');
            $table->string('Total_Time_Spent');
            $table->string('Customer_Feedback');
            $table->string('Feedback_Rating');
            $table->string('Mactus_Service_Person');
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
        Schema::drop('logs_services');
    }
}
