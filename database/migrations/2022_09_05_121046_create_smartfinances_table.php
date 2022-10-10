<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmartfinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smartfinances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('plan_id')->constrained();
            $table->string('no_of_year')->nullable();
            $table->string('amount');
            $table->string('percentage')->nullable();
            $table->string('bill')->nullable();
            $table->date('investment_date');
            $table->boolean('is_status');
            $table->string('accepted_by')->nullable();
            $table->date('accepted_date')->nullable();
            $table->string('rejected_by')->nullable();
            $table->date('next_payment_date')->nullable();
            $table->boolean('is_close')->nullable();
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
        Schema::dropIfExists('smartfinances');
    }
}
