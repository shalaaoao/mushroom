<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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

            $table->string('name', 20)->comment('姓名')->default('');
            $table->string('phone', 20)->comment('手机')->index()->default('');
            $table->string('email')->default('');
            $table->string('password')->comment('密码')->default('');
            $table->tinyInteger('role')->comment('角色 0:路人甲 1:超管 2+其他角色')->default(0);
            $table->rememberToken();
        });

        \App\Model\User::create([
            'id'       => 1,
            'name'     => '陈家傲',
            'phone'    => '13917836275',
            'password' => \Illuminate\Support\Facades\Hash::make('cja19950715'),
            'role'     => \App\Enum\UserEnum::ROLE_SUPER
        ]);
        \App\Model\User::create([
            'id'       => 2,
            'name'     => '俞盼',
            'phone'    => '18817517176',
            'password' => \Illuminate\Support\Facades\Hash::make('920928yp'),
            'role'     => \App\Enum\UserEnum::ROLE_PANZI
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
