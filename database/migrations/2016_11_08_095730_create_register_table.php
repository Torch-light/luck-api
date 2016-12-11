<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('code', function (Blueprint $table) {
            $table->integer('id')->comment('生成人id');
            $table->string('code')->unique()->comment('邀请码');
            $table->boolean('iscode')->default(false)->comment('是否验证通过');
           
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
