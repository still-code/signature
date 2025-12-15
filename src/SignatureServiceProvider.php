<?php

namespace StillCode\Signature;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SignatureServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // I know! 🤷🏽‍, please let me have my fun!!!
        Blade::directive('stillCode', function () {
            return 'Still Code';
        });

        Blade::directive('zeus', function ($part = null) {
            return 'Lara Zeus'
            .($part) ?? '';
        });

        Blade::directive('stillStats', function ($code) {
            if (!app()->isLocal()) {
                return '<!-- stats --><script async defer data-website-id="'.$code.'" src="https://stats.larazeus.com/script.js"></script>';
            }

            return '<!-- no tags for you -->';
        });
    }
}
