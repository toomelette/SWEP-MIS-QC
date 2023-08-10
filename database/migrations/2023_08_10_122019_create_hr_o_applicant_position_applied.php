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
        Schema::create('hr_o_applicant_position_applied', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('applicant_slug')->nullable();
            $table->string('publication_detail_slug')->nullable();
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
        Schema::dropIfExists('hr_o_applicant_position_applied');
    }
};
