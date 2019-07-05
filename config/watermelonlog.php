<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | 日志的默认驱动
    |--------------------------------------------------------------------------
    |
    | 日志的默认驱动设置，可在drives添加自定义驱动
    |
    | 默认自带: "Info", "Api", "Exception"
    |
    */
    'default' => env('WATERMELON_LOG_DEFAULT', 'Info'),


    /*
    |--------------------------------------------------------------------------
    | 日志的驱动组
    |--------------------------------------------------------------------------
    |
    | 日志的驱动组，值为 own 的键值对为自带的日志驱动
    | 自定义添加的格式为
    |       '驱动名' => '路径'
    | 例 ：
    |       'Info' => 'App\Log\InfoLog'
    */
    'drives' => [
        'Info' => 'own',
        'Exception' => 'own',
        'Api' => 'own',
    ]
];
