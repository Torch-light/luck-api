<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('action',function(Blueprint $table){
            $table->bigIncrements('id')->unique()->comment('下注id');
            $table->string('name')->comment('下注人');
            $table->string('num')->comment('当前期数');
            $table->string('money')->comment('金额');
            $table->boolean('prize')->comment('是否中奖');
            $table->string('action')->comment('下注类型');
            $table->integer('multiple')->comment('倍数');
            $table->integer('mark')->comment('邀请人');
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
