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
            new Twig_SimpleFunction('t', ['Radium\Language', 'translate']),
            new Twig_SimpleFunction('format', ['Traq\Helpers\Format', 'text']),
            new Twig_SimpleFunction('run_hook', ['Radium\Hook', 'run']),
            new Twig_SimpleFunction('setting', 'settings'),
            new Twig_SimpleFunction('url', ['Radium\Http\Request', 'basePath']),

            // Subscriptions
            new Twig_SimpleFunction('subscription_link_for', ['Traq\Helpers\Subscription', 'linkFor']),
            new Twig_SimpleFunction('is_subscribed', ['Traq\Helpers\Subscription', 'isSubscribed'])
        ];
    }
}
