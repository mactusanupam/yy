<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Customer_Name');
            $table->string('Customer_PO_Number');
            $table->string('Project_Name');
            $table->string('Invoice_Number');
            $table->string('Invoice_Date');
            $table->string('Invoice_Value');
            $table->string('Mactus_Value');
            $table->string('VAT');
            $table->string('Service_Tax');
            $table->string('Invoice_Submitted_By');
            $table->string('Paymet_Rcvd_On');
            $table->string('Invoice_Description');
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
        Schema::drop('invoices');
    }
}
