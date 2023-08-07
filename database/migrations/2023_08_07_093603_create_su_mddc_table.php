<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('su_mddc', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('mddc')->nullable();
            $table->string('region')->nullable();
            $table->string('chairman')->nullable();
            $table->text('address')->nullable();
            $table->string('mdo')->nullable();
            $table->string('phone')->nullable();
            $table->string('geog_loc')->nullable();
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
        Schema::dropIfExists('su_mddc');
    }
};
