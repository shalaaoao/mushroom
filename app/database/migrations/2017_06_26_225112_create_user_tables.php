<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('name', 20)->comment('姓名');
            $table->string('phone', 20)->comment('手机')->index();
            $table->string('password', 50)->comment('密码');
            $table->tinyInteger('role')->comment('角色 0:路人甲 1:超管 2+其他角色')->default(ROLE_COMMON);
            $table->string('remember_token', 100);
        });

        User::create([
            'id'       => 1,
            'name'     => '陈家傲',
            'phone'    => 13917836275,
            'password' => Hash::make('cja19950715'),
            'role'     => ROLE_SUPER
        ]);
        User::create([
            'id'       => 2,
            'name'     => '目分',
            'phone'    => 18817517176,
            'password' => Hash::make('920928yp'),
            'role'     => ROLE_PANZI
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
