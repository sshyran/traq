<?php

namespace Traq\Helpers;

use Twig_Extension;
use Twig_SimpleFunction;

class Twig extends Twig_Extension
{
    public function getName()
    {
        return "twig";
    }

    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('t', ['Radium\Language', 'translate'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('format', ['Traq\Helpers\Format', 'text'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('run_hook', ['Radium\Hook', 'run'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('setting', 'settings', ['is_safe' => ['html']]),
            new Twig_SimpleFunction('url', ['Radium\Http\Request', 'basePath']),

            // Subscriptions
            new Twig_SimpleFunction('subscription_link_for', ['Traq\Helpers\Subscription', 'linkFor'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('is_subscribed', ['Traq\Helpers\Subscription', 'isSubscribed']),

            // Render time and memory usage
            new Twig_SimpleFunction('render_stats', function(){
                $renderTime  = round((microtime(true) - START_TIME), 2);
                $memoryUsage = round((memory_get_peak_usage() - START_MEM) / pow(1024, 2), 3);

                return "Rendered in {$renderTime}s using {$memoryUsage}mb of memory";
            })
        ];
    }
}
