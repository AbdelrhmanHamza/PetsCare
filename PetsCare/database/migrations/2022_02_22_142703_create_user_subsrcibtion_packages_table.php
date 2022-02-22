<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubsrcibtionPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subsrcibtion_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subscribtion_package_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('subscribtion_package_id')
                ->references('id')
                ->on('subscribtion_packages');
                $table->boolean('is_expired')->default(false);
                $table->timestamps();
                $table->dateTime('subscribtion_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_subsrcibtion_packages');
    }
}
