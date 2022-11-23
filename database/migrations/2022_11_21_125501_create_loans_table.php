<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->constrained();
            $table->string('amount');
            $table->string('intrest')->nullable();
            $table->string('property_type');
            $table->string('property_value');
            $table->string('property_copy')->nullable();
            $table->date('requested_on');
            $table->date('approved_on');
            $table->boolean('is_status');
            $table->boolean('is_close');
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
        Schema::dropIfExists('loans');
    }
}
