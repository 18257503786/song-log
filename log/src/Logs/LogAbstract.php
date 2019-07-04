<?php

namespace Song\Log\Logs;

use Song\Log\Models\Log;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/3
 * Time: 11:42
 */
abstract class LogAbstract
{
    public $id = 0;
    public $type = '';
    public $ip = '';
    public $location = '';
    public $line = 0;
    public $title = '';
    public $user = 0;
    public $data = [];
    public $request = [];
    public $result = [];
    public $content = [];

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setIp($ip)
    {
        $this->content['ip'] = $ip;
        $this->ip            = $ip;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setLocation($location)
    {
        $this->content['location'] = $location;
        $this->location            = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLine($line)
    {
        $this->content['line'] = $line;
        $this->line            = $line;
    }

    public function getLine()
    {
        return $this->line;
    }

    public function setTitle($title)
    {
        $this->content['title'] = $title;
        $this->title            = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setUser($user)
    {
        $this->content['user'] = $user;
        $this->user            = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUrl($url)
    {
        $this->content['url'] = $url;
        $this->url            = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setData($data)
    {
        $this->content['data'] = $data;
        $this->data            = $data;
    }

    public function getData()
    {
        return json_encode($this->data);
    }

    public function setRequest($request)
    {
        $this->content['request'] = $request;
        $this->request            = $request;
    }

    public function getRequest()
    {
        return json_encode($this->request);
    }

    public function setResult($result)
    {
        $this->content['result'] = $result;
        $this->result            = $result;
    }

    public function getResult()
    {
        return json_encode($this->result);
    }

    /**
     * setRequestAll
     * 记录 IP Url 方法 行号 传入参数
     *
     * @author   leisong  <1213857645@qq.com>
     * @DateTime 2019/7/3  14:40
     */
    public function setRequestAll()
    {
        $request = request();
        $this->setIp($request->getClientIp());
        $this->setUrl($request->getRequestUri());
        $this->setLocation(debug_backtrace()[4]['class'].'@'.debug_backtrace()[4]['function']);
        $this->setLine(debug_backtrace()[4]['line']);
        $this->setRequest($request);
    }

    /**
     * saveLog
     *  保存日志
     *
     * @return $this
     * @author   leisong  <1213857645@qq.com>
     * @DateTime 2019/7/3  14:41
     */
    public function saveLog()
    {
        $data['user_id']  = $this->getUser();
        $data['type']     = $this->getType();
        $data['url']      = $this->getUrl();
        $data['ip']       = $this->getIp();
        $data['location'] = $this->getLocation();
        $data['line']     = $this->getLine();
        $data['title']    = $this->getTitle();
        $data['data']     = $this->getData();
        $data['request']  = $this->getRequest();
        $data['result']   = $this->getResult();
        $log              = Log::updateOrCreate(['id' => $this->getId()], $data);
        $this->setId($log->id);
        return $this;
    }
}