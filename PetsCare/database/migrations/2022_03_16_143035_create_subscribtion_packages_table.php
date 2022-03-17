<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribtionPackagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribtion_packages', function (Blueprint $table) {
            $table->id('id');
            $table->string('id');
            $table->string('subscribtion_package_name');
            $table->longText('subscribtion_package_description');
            $table->integer('activation_period');
            $table->decimal('subscribtion_package_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscribtion_packages');
    }
}
