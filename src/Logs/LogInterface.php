<?php

namespace Watermelon\Log\Logs;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/3
 * Time: 11:39
 */
interface LogInterface
{
    /**
     * record
     * 存储日志
     *
     * @return mixed
     * @author   leisong  <1213857645@qq.com>
     * @DateTime 2019/7/3  11:40
     */
    public function record($data);
}