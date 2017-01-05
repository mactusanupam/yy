<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectinformations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_Name');
            $table->string('Estimated_Time');
            $table->string('Status');
            $table->date('Project_StartDate');
            $table->date('Project_EndDate');
            $table->string('Timespent');
            $table->string('PO_Number');
            $table->date('PO_Date');
            $table->string('PO_value');
            $table->string('PO_Description');
            $table->string('Project_ID');
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
        Schema::drop('projectinformations');
    }
}
