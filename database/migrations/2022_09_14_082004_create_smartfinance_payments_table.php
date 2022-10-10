<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmartfinancePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smartfinance_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('smartfinance_id')->constrained();
            $table->date('investment_date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('intrest')->nullable();
            $table->string('investment_amount')->nullable();
            $table->string('next_amount')->nullable();
            $table->string('balance')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_date');
            $table->string('paid_by')->nullable();
            $table->string('bill')->nullable();
             $table->boolean('is_approve')->nullable();
            $table->boolean('is_status');
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
        Schema::dropIfExists('smartfinance_payments');
    }
}
