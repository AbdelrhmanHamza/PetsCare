<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id('id');
            $table->integer('client_profile_id')->unsigned();
            $table->string('pet_type');
            $table->string('pet_breed');
            $table->dateTime('pet_age');
            $table->boolean('has_medical_condition');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_profile_id')->references('id')->on('client_profiles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pets');
    }
}
