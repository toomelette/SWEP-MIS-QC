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
        Schema::table('budget_pap', function (Blueprint $table) {
            $table->dateTime('date_started')->nullable();
            $table->dateTime('projected_date_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budget_pap', function (Blueprint $table) {
            $table->dropColumn(['date_started','projected_date_end']);
        });
    }
};
