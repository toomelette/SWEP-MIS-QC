<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetAnnualBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_annual_budget', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('project_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('department')->nullable();
            $table->string('account_code')->nullable();
            $table->decimal('amount',20,2)->nullable();
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
        Schema::dropIfExists('budget_annual_budget');
    }
}
