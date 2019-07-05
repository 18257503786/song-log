<?php

namespace Watermelon\Log;

use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/2
 * Time: 14:17
 */

class Log extends Facade
{
    /**
     * 指定服务容器.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'songlog';
    }
}