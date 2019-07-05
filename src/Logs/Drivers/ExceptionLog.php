<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/3
 * Time: 14:54
 */

namespace Song\Log\Logs\Drivers;

use Song\Log\Logs\LogAbstract;
use Song\Log\Logs\LogInterface;

class ExceptionLog extends LogAbstract implements LogInterface
{
    public $type = 'Exception';
    public $content
        = [
            'type' => 'Exception'
        ];

    /**
     * record
     * 存储日志
     *
     * @return mixed
     * @author   leisong  <1213857645@qq.com>
     * @DateTime 2019/7/3  11:40
     */
    public function record($data)
    {
        $this->setRequestAll();
        $this->setTitle($data['title']??'');
        $this->setRequest($data['request']??'');
        $this->setResult($data['result']??'');
        return $this->saveLog();
    }
}