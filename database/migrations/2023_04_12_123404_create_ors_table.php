<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_ors', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('project_id')->nullable();
            $table->string('ors_id')->nullable();
            $table->string('funds')->nullable();
            $table->string('ors_no')->nullable();
            $table->string('base_ors_no')->nullable();
            $table->date('ors_date')->nullable();
            $table->string('ref_book')->nullable();
            $table->string('ref_doc')->nullable();
            $table->string('payee')->nullable();
            $table->string('office')->nullable();
            $table->string('address')->nullable();
            $table->string('particulars')->nullable();
            $table->string('certified_by')->nullable();
            $table->string('certified_by_position')->nullable();
            $table->string('certified_budget_by')->nullable();
            $table->string('certified_budget_by_position')->nullable();
            $table->decimal('amount',30,2)->nullable();
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('ip_created')->nullable();
            $table->string('ip_updated')->nullable();
            $table->timestamps();
        });

        Schema::create('budget_ors_details',function (Blueprint $table){
            $table->id();
            $table->string('slug')->nullable();
            $table->string('ors_slug')->nullable();
            $table->string('type')->nullable();
            $table->integer('seq_no')->nullable();
            $table->string('resp_center')->nullable();
            $table->string('dept')->nullable();
            $table->string('unit')->nullable();
            $table->string('account_code')->nullable();
            $table->decimal('debit',25,2)->nullable();
            $table->decimal('credit',25,2)->nullable();
        });

        Schema::create('budget_chart_of_accounts',function (Blueprint $table){
            $table->id();
            $table->string('slug')->nullable();
            $table->string('account_code')->nullable();
            $table->string('account_title')->nullable();
        });

        Schema::create('budget_projects_applied',function (Blueprint $table){
            $table->id();
            $table->string('slug')->nullable();
            $table->string('ors_slug')->nullable();
            $table->string('transaction_type')->nullable();
            $table->decimal('amount',25,2)->nullable();
        });

        Schema::create('budget_ors_payee',function (Blueprint $table){
            $table->id();
            $table->string('slug')->nullable();
            $table->string('ors_slug')->nullable();
            $table->string('payee')->nullable();
            $table->decimal('amount',20,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_ors');
        Schema::dropIfExists('budget_ors_details');
        Schema::dropIfExists('budget_chart_of_accounts');
        Schema::dropIfExists('budget_projects_applied');
        Schema::dropIfExists('budget_ors_payee');

    }
}
