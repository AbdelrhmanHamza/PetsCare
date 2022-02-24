<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeatureSubscribtionPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_subscribtion_package', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feature_id');
            $table->unsignedBigInteger('subscribtion_package_id');
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
        Schema::dropIfExists('feature_subscribtion_package');

    }
}
