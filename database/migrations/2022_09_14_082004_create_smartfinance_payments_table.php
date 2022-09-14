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
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('amount');
            $table->string('payment_date');
            $table->string('paid_by')->nullable();
            $table->string('status');
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
