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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('curator_id')->unsigned()->index();
            $table->foreign('curator_id')->references('id')->on('users');
            $table->string('type_of_object');
            $table->string('location_of_object');
            $table->string('description_title');
            $table->Integer('number_of_pieces');
            $table->string('length');
            $table->string('width');
            $table->string('medium_and_material');
            $table->string('maker_artist');
            $table->string('location_of_signation');
            $table->date('date_of_birth')->nullable();
            $table->string('location_of_date_on_object');
            $table->string('writing_other_than_signature');
            $table->string('place_of_origin');
            $table->string('place_collected');
            $table->date('date_received')->nullable();
            $table->string('original_as_shown');
            $table->string('object_original_used');
            $table->string('receipt');
            $table->string('item_description');
            $table->string('condition_of_object');
            $table->longText('history');
            $table->string('purchase_or_received');
            $table->longText('personal_story_of_this_object');
            $table->string('inventory_image');
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
        Schema::dropIfExists('inventories');
    }
};
