<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id')->unsigned();
            $table->enum('business_type', ['vet','ranch','hotel','private']);
            $table->string('business_name');
            $table->string('address');
            $table->string('phone_number');
            $table->longText('service_description');
            $table->string('open_at');
            $table->string('close_at');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business_profiles');
    }
}
