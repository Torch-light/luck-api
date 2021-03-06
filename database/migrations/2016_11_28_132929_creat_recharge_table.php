<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRechargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('recharge',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('uid');
            $table->string('name');
            $table->string('mark');
            $table->integer('money');
            $table->boolean('ispass');
            $table->timestamps();
            $table->softDeletes();
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
