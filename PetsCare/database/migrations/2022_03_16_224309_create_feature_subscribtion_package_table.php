<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureSubscribtionPackagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_subscribtion_packages', function (Blueprint $table) {
            $table->id('id');
            $table->string('id');
            $table->integer('feature_id')->unsigned();
            $table->integer('subscribtion_package_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('feature_id')->references('id')->on('features')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subscribtion_package_id')->references('id')->on('subscribtion_packages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('feature_subscribtion_packages');
    }
}
