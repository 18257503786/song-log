<?php

namespace Watermelon\Log\Exception;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/3
 * Time: 10:56
 */
class LogException extends \Exception
{
    function __construct(string $message = '', $code = 10005)
    {
        parent::__construct($message, $code);
    }
}