<?php

namespace AtmCode\Signature;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SignatureServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // I know! 🤷🏽‍, please let me have my fun!!!
        Blade::directive('atmCode', function () {
            return '<link rel="stylesheet" href="https://still-code.com/css/atm-sign.css"><span class="atm-font-courier"><span class="atm-font-courier atm-rounded-lg atm-bg-gray-200 atm-italic px-2 dark:atm-bg-gray-600"><span class="atm-font-courier atm-not-italic">Still ~ </span><span class="atm-font-courier atm-not-italic atm-text-purple-500">&lt;?</span><span> code</span><span class="atm-font-courier blink-cursor atm-not-italic atm-font-thin atm-text-gray-400">|</span><span class="atm-font-courier atm-not-italic atm-text-purple-500">?&gt;</span></span></span>';
        });

        Blade::directive('zeus', function ($part = null) {
            return '<link rel="stylesheet" href="https://still-code.com/css/atm-sign.css"><span class="atm-font-koho atm-text-gray-700 atm-group"><span class="atm-font-koho atm-font-semibold atm-text-green-600 group-hover:atm-text-yellow-500 atm-transition atm-ease-in-out atm-duration-300">Lara&nbsp;<span class="atm-font-koho atm-line-through atm-italic atm-text-yellow-500 group-hover:atm-text-green-600 atm-transition atm-ease-in-out atm-duration-300">Z</span>eus</span></span>'
                .($part) ?? '<span class="atm-font-koho atm-text-base atm-tracking-wide atm-text-gray-500">{$part}</span>';
        });

        Blade::directive('atmStats', function ($code) {
            $jsTag = '<!-- stats --><script async defer data-website-id="'.$code.'" src="https://stats.still-code.com/umami.js"></script>';
            if (!app()->isLocal() && !(new \Jenssegers\Agent\Agent())->isRobot()) {
                return $jsTag;
            }
            return '<!-- no tags for you -->';
        });
    }
}
