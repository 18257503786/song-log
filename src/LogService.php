<?php

namespace Watermelon\Log;

use Watermelon\Log\exception\LogException;

class LogService
{
    //驱动对应的日志文件组
    public $drives;

    //指定驱动
    public $default;

    public function __construct($config)
    {
        $drives = [];
        foreach ($config['drives'] as $k => $v) {
            $drive = ucfirst($k);
            if ($v == 'own') {
                $path           = 'Watermelon\Log\Logs\drivers\\'.$drive.'Log';
                $drives[$drive] = $path;
            } else {
                $drives[$drive] = $v;
            }
        }
        $this->drives  = $drives;
        $this->default = $config['default'];
    }

    /**
     * driver
     * 指定驱动
     *
     * @param $drive
     *
     * @return $this
     * @throws LogException
     * @author   leisong  <1213857645@qq.com>
     * @DateTime 2019/7/3  15:17
     */
    public function driver($drive)
    {
        if (!array_key_exists(ucfirst($drive), $this->drives)) {
            throw new LogException("未知的驱动，无法根据该驱动记录日志");
        }
        $this->default = $drive;
        return $this;
    }

    /**
     * record
     * 存储日志
     *
     * @param $data
     *
     * @return mixed
     * @author   leisong  <1213857645@qq.com>
     * @DateTime 2019/7/3  15:18
     */
    public function record($data)
    {
        $log = new $this->drives[$this->default]();
        return $log->record($data);
    }

    /**
     * __call
     * 访问日志类的自定义方法
     *
     * @param $method
     * @param $parameters
     *
     * @return mixed
     * @author   leisong  <1213857645@qq.com>
     * @DateTime 2019/7/3  15:18
     */
    public function __call($method, $parameters)
    {
        $log = $this->drives[$this->default];
        return $log->$method($parameters);
    }
}