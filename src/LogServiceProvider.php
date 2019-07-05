<?php

namespace Song\Log;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        //拷贝配置文件
        $this->publishes([
            __DIR__.'/../config/songlog.php' => config_path('songlog.php'),
        ]);
        //添加迁移文件
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //绑定日志服务
        $this->app->singleton('songlog', function ($app)
        {
            return new LogService(config('songlog'));
        });
    }
}