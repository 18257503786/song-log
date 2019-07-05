<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16
 * Time: 12:01
 */

namespace Watermelon\Log\Logs\Drivers;

use Watermelon\Log\Logs\LogAbstract;
use Watermelon\Log\Logs\LogInterface;

class InfoLog extends LogAbstract implements LogInterface
{

    public $type = 'Info';
    public $content
        = [
            'type' => 'Info'
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
        $this->setData($data['data']??'');
        return $this->saveLog();
    }
}