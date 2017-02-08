<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutualFunds extends Migration
{
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {


            $table->engine = 'InnoDB';



            $table->increments('id');
            $table->string('category');
            $table->string('description');
            $table->string('pooled_with');
            $table->float('acquired_net_asset_value');
            $table->date('acquired_date');
            $table->float('estimated_yield_over_two_yrs');
            $table->integer('customer_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('funds', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('funds');
    }
}

