<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReconstructProjectsApplied extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('budget_projects_applied');
        Schema::create('budget_projects_applied',function (Blueprint $table){
            $table->id();
            $table->string('slug')->nullable();
            $table->string('ors_slug')->nullable();
            $table->string('pap_code')->nullable();
            $table->decimal('co',20,2);
            $table->decimal('mooe',20,2);
            $table->decimal('total',25,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
