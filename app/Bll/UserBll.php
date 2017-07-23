<?php

namespace App\Bll;

use App\Enum\UserEnum;

class UserBll extends BaseBll
{
    //获取登陆用户的跳转地址
    public static function getUserRedirectUri($role)
    {
        if ($role == UserEnum::ROLE_SUPER || $role == UserEnum::ROLE_PANZI) {
            $uri = Route('panzi.alert');
        } else {
            $uri = Route('index');
        }

        return $uri;
    }

}