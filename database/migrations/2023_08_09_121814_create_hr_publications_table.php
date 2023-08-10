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
        Schema::create('hr_publications', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->date('date')->nullable();
            $table->date('deadline')->nullable();
            $table->string('send_to')->nullable();
            $table->string('send_to_position')->nullable();
            $table->string('send_to_address')->nullable();
            $table->string('send_to_email')->nullable();
            $table->timestamps();
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('ip_created')->nullable();
            $table->string('ip_updated')->nullable();

        });

        Schema::create('hr_publications_details', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('publication_slug')->nullable();
            $table->integer('no')->nullable();
            $table->string('position')->nullable();
            $table->string('item_no')->nullable();
            $table->string('salary_grade')->nullable();
            $table->decimal('monthly_salary',20,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hr_publications');
        Schema::dropIfExists('hr_publications_details');
    }
};
