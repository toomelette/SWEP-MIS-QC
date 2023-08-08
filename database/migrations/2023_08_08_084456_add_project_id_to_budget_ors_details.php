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
        Schema::table('budget_ors_details', function (Blueprint $table) {
            $table->integer('project_id')->after('id')->nullable();
        });
        Schema::table('budget_projects_applied', function (Blueprint $table) {
            $table->integer('project_id')->after('id')->nullable();
        });

        Schema::table('budget_pap', function (Blueprint $table) {
            $table->integer('project_id')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budget_ors_details', function (Blueprint $table) {
            $table->dropColumn(['project_id']);
        });
        Schema::table('budget_projects_applied', function (Blueprint $table) {
            $table->dropColumn(['project_id']);
        });

        Schema::table('budget_pap', function (Blueprint $table) {
            $table->dropColumn(['project_id']);
        });
    }
};
