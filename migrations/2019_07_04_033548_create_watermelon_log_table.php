<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatermelonLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watermelon_logs', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->default(0)->nullable()->index()->comment('用户id');             //用户id
            $table->string('type', 30)->default('info')->nullable()->index()
                ->comment('日志类型 info普通日志 pay支付日志 exception异常日志 payException支付异常日志 api第三方返回日志 apiException第三方返回异常日志');     //日志类型
            $table->string('url')->nullable()->comment('路由');        //ip
            $table->string('ip', 50)->nullable()->comment('ip');        //ip
            $table->string('location', 50)->index()->nullable()->comment('触发位置'); //触发位置
            $table->integer('line')->nullable()->comment('触发行');                //触发行
            $table->string('title', 100)->nullable()->index()->comment('标题描述');    //标题描述
            $table->text('data')->nullable()->comment('内容');                   //内容
            $table->text('request')->nullable()->comment('请求内容');                //请求内容
            $table->text('result')->nullable()->comment('响应内容');                 //响应内容
            $table->timestamps();
        });
        $prefix = config('database.connections.mysql.prefix');
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `".$prefix."watermelon_logs` comment '日志表'");//表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watermelon_logs');
    }
}
