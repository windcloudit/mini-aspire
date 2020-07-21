<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('document_date');
            $table->unsignedFloat('interest_rate')->default(1)->comment('Interest rate per week');
            $table->unsignedInteger('amount')->comment('Amount need to loan');
            $table->unsignedInteger('loan_term')->comment('number of week');
            $table->boolean('approve')->default(1);
            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_registers');
    }
}
