<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            // At least one primary email is required.
            $table->string('primary_email');
            // Contact may not have additional emails so this can be null.
            $table->string('business_email')->nullable();
            $table->string('other_email')->nullable();
            // At least one primary phone is required.
            $table->string('primary_phone');
            // Contact may not have additional phone #s so this can be null.
            $table->string('home_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('other_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
