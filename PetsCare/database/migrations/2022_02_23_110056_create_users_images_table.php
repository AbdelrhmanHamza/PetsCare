<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_name');
            $table->string('image_path');
            $table->unsignedInteger('pet_id')->nullable();
            $table->unsignedInteger('business_profile_id')->nullable();
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
        Schema::dropIfExists('users_images');
    }
}
