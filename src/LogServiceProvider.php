<?php

namespace Watermelon\Log;

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
            __DIR__ . '/../config/watermelonlog.php' => config_path('watermelonlog.php'),
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
        $this->app->singleton('watermelonlog', function ($app)
        {
            return new LogService(config('watermelonlog'));
        });
    }
}