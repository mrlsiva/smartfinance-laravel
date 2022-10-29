<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextMonthPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_month_payouts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->constrained();
            $table->string('name');
            $table->date('date');
            $table->string('plan')->nullable();
            $table->string('next_payout_amount');
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
        Schema::dropIfExists('next_month_payouts');
    }
}
