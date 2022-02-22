<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientBusinessResquestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //// TODO Blocked on service packages branch.
        Schema::create('client_business_resquests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_profile_id');
            $table->unsignedBigInteger('business_profile_id');
            $table->unsignedBigInteger('package_id');
            $table->string('description');
            $table->dateTime('request_due_date');
            $table->boolean('is_read')->default(0);
            $table->foreign('client_profile_id')->references('id')->on('client_profiles')->constrained()->onDelete('cascade');
            $table->foreign('business_profile_id')->references('id')->on('business_profiles')->constrained()->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('service_packages')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('client_business_resquests');
    }
}
