<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuckuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->comment('用户id');
            $table->string('name')->unique()->comment('用户姓名');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('role_id')->comment('用户权限');
            $table->ipAddress('ip');
            $table->string('is_delete');
            $table->string('mark');
            $table->integer('points')->default(0);
            $table->rememberToken();
            $table->softDeletes('isdelete');
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
        //
    }
}
