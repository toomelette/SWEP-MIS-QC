<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisIpAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_ip_address', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('user')->nullable();
            $table->string('employee_no')->nullable();
            $table->string('property_no')->nullable();
            $table->string('location')->nullable();
            $table->integer('octet_1')->nullable();
            $table->integer('octet_2')->nullable();
            $table->integer('octet_3')->nullable();
            $table->integer('octet_4')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('ip_created')->nullable();
            $table->string('ip_updated')->nullable();
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
        Schema::dropIfExists('mis_ip_address');
    }
}
