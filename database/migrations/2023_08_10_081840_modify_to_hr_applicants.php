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
        Schema::table('hr_applicants', function (Blueprint $table) {
            $table->string('thru');
            $table->string('email');
            $table->string('res_block');
            $table->string('res_street');
            $table->string('res_subdivision');
            $table->string('res_barangay');
            $table->string('res_city');
            $table->string('res_province');
            $table->string('citizenship');
            $table->string('citizenship_type');
        });

        Schema::create('hr_o_applicant_education',function (Blueprint $table){
            $table->id();
            $table->string('applicant_slug')->nullable();
            $table->string('slug')->nullable();
            $table->string('level')->nullable();
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('highest_level_earned')->nullable();
            $table->integer('year_graduated')->nullable();
            $table->string('scholarship')->nullable();
        });
        Schema::create('hr_o_applicant_eligibilities',function (Blueprint $table){
            $table->id();
            $table->string('applicant_slug')->nullable();
            $table->string('slug')->nullable();
            $table->string('eligibility')->nullable();
            $table->string('rating')->nullable();
            $table->date('date')->nullable();
            $table->string('place')->nullable();
            $table->string('license_no')->nullable();
            $table->date('license_validity')->nullable();
        });
        Schema::create('hr_o_applicant_work_experiences',function (Blueprint $table){
            $table->id();
            $table->string('applicant_slug')->nullable();
            $table->string('slug')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->decimal('monthly_salary',20,2)->nullable();
            $table->string('sg_si')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_govt')->nullable();
        });
        Schema::create('hr_o_applicant_trainings',function (Blueprint $table){
            $table->id();
            $table->string('applicant_slug')->nullable();
            $table->string('slug')->nullable();
            $table->string('training')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->float('number_of_hours')->nullable();
            $table->string('type')->nullable();
            $table->string('conducted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_applicants', function (Blueprint $table) {
            $table->dropColumn([
                'thru',
                'email',
                'res_block',
                'res_street',
                'res_subdivision',
                'res_barangay',
                'res_city',
                'res_province',
                'citizenship',
                'citizenship_type',
            ]);
        });
        Schema::dropIfExists('hr_o_applicant_education');
        Schema::dropIfExists('hr_o_eligibilities');
        Schema::dropIfExists('hr_o_work_experiences');
        Schema::dropIfExists('hr_o_trainings');
    }
};
