<?php

namespace Watermelon\Log\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/2
 * Time: 15:22
 */
class Log extends Model
{
    protected $table = 'watermelon_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}