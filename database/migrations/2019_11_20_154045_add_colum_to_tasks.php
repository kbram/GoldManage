<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks',function($table){
            $table->integer('user_id');
            $table->integer('employee_id');
            $table->integer('product_id');
            $table->integer('gold_weight');
            $table->date('received_date');
            $table->date('complete_date');
            $table->integer('quantity');
            $table->integer('wastage');
            $table->integer('final_weight');
            $table->boolean('complete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveries',function($table){
            $table->dropColumn('user_id');
            $table->dropColumn('employee_id');
            $table->dropColumn('product_id');
            $table->dropColumn('gold_weight');
            $table->dropColumn('received_date');
            $table->dropColumn('complete_date');
            $table->dropColumn('quantity');
            $table->dropColumn('wastage');
            $table->dropColumn('final_weight');
            $table->dropColumn('complete')->default(0);
        });
    }
}
