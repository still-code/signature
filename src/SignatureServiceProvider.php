<?php

namespace AtmCode\Signature;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SignatureServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // I know! 🤷🏽‍, please let me have my fun!!!

        View::composer('*', function ($view) {
            return $view->with('atmStyles','https://atm-code.com/css/atm-sign.css');
        });

        Blade::directive('atmCode', function () {
            return '<link rel="stylesheet" href="{{ $atmStyles }}"><span class="font-courier"><span class="font-courier rounded-lg bg-gray-200 italic px-2 dark:bg-gray-600"><span class="font-courier not-italic">ATM ~ </span><span class="font-courier not-italic text-purple-500">&lt;?</span><span> code</span><span class="font-courier blink-cursor not-italic font-thin text-gray-400">|</span><span class="font-courier not-italic text-purple-500">?&gt;</span></span></span>';
        });

        Blade::directive('zeus', function ($part = null) {
            return '<span class="font-koho text-gray-700 group"><span class="font-koho font-semibold text-green-600 group-hover:text-yellow-500 transition ease-in-out duration-300">Lara&nbsp;<span class="font-koho line-through italic text-yellow-500 group-hover:text-green-600 transition ease-in-out duration-300">Z</span>eus</span></span>'
                . ($part) ?? '<span class="font-koho text-base tracking-wide text-gray-500">{$part}</span>';
        });

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('signature', function () {
            return new signature;
        });
    }
}
