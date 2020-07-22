<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_register_id');
            $table->date('repayment_due_date');
            $table->unsignedInteger('week');
            $table->unsignedFloat('original_amount');
            $table->unsignedFloat('interest_amount');
            $table->unsignedFloat('total_amount');
            $table->unsignedFloat('outstanding_balance');
            $table->unsignedTinyInteger('status')->default(1)->comment('Status repayment');
            $table->timestamps();
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
        Schema::dropIfExists('repayments');
    }
}
