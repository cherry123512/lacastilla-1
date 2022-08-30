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
        Schema::table('Inventories', function (Blueprint $table) {
            $table->string('weight')->nullable();
            $table->string('diameter')->nullable();
            $table->string('height')->nullable();
            $table->string('reference_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Inventories', function (Blueprint $table) {
            $table->string('weight')->nullable();
            $table->string('diameter')->nullable();
            $table->string('height')->nullable();
            $table->string('reference_number')->nullable();
        });
    }
};
