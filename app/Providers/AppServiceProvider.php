<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

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
        Password::defaults(function () {
            $rule = Password::min(8);

            return Str::of($this->app->environment())->lower() === 'production'
                ? $rule->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(3)
                : $rule;
        });

        Paginator::useTailwind();
    }
}
