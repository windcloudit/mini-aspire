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
            $table->unsignedDecimal('original_amount');
            $table->unsignedDecimal('interest_amount');
            $table->unsignedDecimal('total_amount');
            $table->unsignedDecimal('outstanding_balance');
            $table->unsignedTinyInteger('status')->default(1)->comment('Status repayment');
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
        Schema::dropIfExists('repayments');
    }
}
