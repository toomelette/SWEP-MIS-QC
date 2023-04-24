<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecontructCoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('budget_chart_of_accounts','acctg_chart_of_accounts');
        Schema::table('acctg_chart_of_accounts',function (Blueprint $table){
            $table->string('account_init')->nullable();
            $table->integer('gl_group_id')->nullable();
            $table->string('gl_group')->nullable();
            $table->integer('nature_id')->nullable();
            $table->integer('bank_rec_account')->nullable();
            $table->integer('normal_bal')->nullable();
            $table->integer('isbs_accounts')->nullable();
            $table->integer('resp_center')->nullable();
            $table->integer('header_1')->nullable();
            $table->integer('header_2')->nullable();
            $table->integer('header_3')->nullable();
            $table->string('name_of_collecting_officer')->nullable();
            $table->string('parent_account')->nullable();
            $table->string('child_account')->nullable();
            $table->integer('has_sched')->nullable();
            $table->integer('auto_dv')->nullable();
            $table->integer('fa_account')->nullable();
            $table->integer('for_or')->nullable();
            $table->integer('taxable')->nullable();
            $table->integer('bur_per_account')->nullable();
            $table->string('bur_oblig')->nullable();
            $table->integer('bur_oblig_group')->nullable();
            $table->string('g1')->nullable();
            $table->string('g2')->nullable();
            $table->string('g4')->nullable();
            $table->integer('treas_account')->nullable();
            $table->integer('tax')->nullable();
            $table->string('account_number')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('acctg_chart_of_accounts','budget_chart_of_accounts');
        Schema::table('',function (Blueprint $table){
           $table->dropColumn([
               'account_init',
               'gl_group_id',
                'gl_group',
                'nature_id',
                'bank_rec_account',
                'normal_bal',
                'isbs_accounts',
                'resp_center',
                'header_1',
                'header_2',
                'header_3',
                'name_of_collecting_officer',
                'parent_account',
                'child_account',
                'has_sched',
                'auto_dv',
                'fa_account',
                'for_or',
                'taxable',
                'bur_per_account',
                'bur_oblig',
                'bur_oblig_group',
                'g1',
                'g2',
                'g4',
                'treas_account',
                'tax',
                'account_number',
           ]);
        });
    }
}
