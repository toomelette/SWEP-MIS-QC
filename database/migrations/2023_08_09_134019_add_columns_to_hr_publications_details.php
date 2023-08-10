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
        Schema::table('hr_publications_details', function (Blueprint $table) {
            $table->string('qs_education',512)->nullable();
            $table->string('qs_training',512)->nullable();
            $table->string('qs_experience',512)->nullable();
            $table->string('qs_eligibility',512)->nullable();
            $table->string('qs_competency',512)->nullable();
            $table->string('place_of_assignment')->nullable();
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
        Schema::table('hr_publications_details', function (Blueprint $table) {
            $table->dropColumn(['qs_education','qs_training','qs_experience','qs_eligibility','qs_competency','place_of_assignment']);
        });
    }
};
