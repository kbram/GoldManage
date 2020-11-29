<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToDeliveries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deliveries',function($table){
            $table->integer('task_id');
            $table->integer('user_id');
            $table->integer('supplier_id');
            $table->integer('amount');
            $table->date('delivery_date');
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
            $table->dropColumn('task_id');
            $table->dropColumn('user_id');
            $table->dropColumn('supplier_id');
            $table->dropColumn('amount');
            $table->dropColumn('delivery_date');
        });
    }
}
