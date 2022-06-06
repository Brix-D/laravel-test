<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

/**
 * утранение ошибки с миграциями
 * @see https://mb4.ru/frameworks/laravel/articles/1027-laravel-migrate-error-specified-key-was-too-long.html
 * */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        \DB::listen(function ($query) {
            var_dump([$query->sql, $query->time / 1000 . ' ms']);
        });
    }
}
