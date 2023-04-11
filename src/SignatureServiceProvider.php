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
            return '<link rel="stylesheet" href="https://still-code.com/css/still-sign.css"><span class="still-font-courier"><span class="still-font-courier still-rounded-lg still-bg-gray-200 still-italic px-2 dark:still-bg-gray-600"><span class="still-font-courier still-not-italic">Still ~ </span><span class="still-font-courier still-not-italic still-text-purple-500">&lt;?</span><span> code</span><span class="still-font-courier blink-cursor still-not-italic still-font-thin still-text-gray-400">|</span><span class="still-font-courier still-not-italic still-text-purple-500">?&gt;</span></span></span>';
        });

        Blade::directive('zeus', function ($part = null) {
            return '<link rel="stylesheet" href="https://still-code.com/css/still-sign.css"><span class="still-font-koho still-text-gray-700 still-group"><span class="still-font-koho still-font-semibold still-text-green-600 group-hover:still-text-yellow-500 still-transition still-ease-in-out still-duration-300">Lara&nbsp;<span class="still-font-koho still-line-through still-italic still-text-yellow-500 group-hover:still-text-green-600 still-transition still-ease-in-out still-duration-300">Z</span>eus</span></span>'
                .($part) ?? '<span class="still-font-koho still-text-base still-tracking-wide still-text-gray-500">{$part}</span>';
        });

        Blade::directive('stillStats', function ($code) {
            $jsTag = '<!-- stats --><script async defer data-website-id="'.$code.'" src="https://stats.still-code.com/umami.js"></script>';
            if (!app()->isLocal() && !(new \Jenssegers\Agent\Agent())->isRobot()) {
                return $jsTag;
            }

            return '<!-- no tags for you -->';
        });
    }
}
