<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('schedule_id');
            $table->BigInteger('user_id');
            $table->date('reservation_date')->nullable();
            $table->string('reservation_time')->nullable();
            $table->Integer('number_of_persons');
            $table->date('validation_date')->nullable();
            $table->bigInteger('curator_id');
            $table->string('remarks');
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
        Schema::dropIfExists('reservations');
    }
};
