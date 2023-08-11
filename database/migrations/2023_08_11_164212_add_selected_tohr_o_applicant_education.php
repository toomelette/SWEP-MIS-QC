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
        Schema::table('hr_o_applicant_education',function (Blueprint $table){
            $table->integer('selected')->nullable();
        });

        Schema::table('hr_o_applicant_eligibilities',function (Blueprint $table){
            $table->integer('selected')->nullable();
        });

        Schema::table('hr_o_applicant_trainings',function (Blueprint $table){
            $table->integer('selected')->nullable();
        });

        Schema::table('hr_o_applicant_work_experiences',function (Blueprint $table){
            $table->integer('selected')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_o_applicant_education',function (Blueprint $table){
            $table->dropColumn(['selected']);
        });

        Schema::table('hr_o_applicant_eligibilities',function (Blueprint $table){
            $table->dropColumn(['selected']);
        });

        Schema::table('hr_o_applicant_trainings',function (Blueprint $table){
            $table->dropColumn(['selected']);
        });

        Schema::table('hr_o_applicant_work_experiences',function (Blueprint $table){
            $table->dropColumn(['selected']);
        });
    }
};
