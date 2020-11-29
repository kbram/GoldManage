<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers',function($table){
            $table->string('nic_no');
            $table->string('name');
            $table->string('phone_no')->length(11);
            $table->mediumText('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suppliers',function($table){
            $table->dropColumn('nic_no');
            $table->dropColumn('name');
            $table->dropColumn('phone_no');
            $table->dropColumn('address');
        });
    }
}
