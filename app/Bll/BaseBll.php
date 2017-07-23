<?php

namespace App\Bll;

class BaseBll
{
    const STATUS_OK    = 1; //成功
    const STATUS_ERROR = 0; //失败

    /*
    * 返回信息状态
    * */
    public static function returnData($status, $data = null)
    {
        return ['status' => $status, 'data' => $data];
    }
}