<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

use Sijad\GithubAutolink\Listener;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->subscribe(Listener\AddClientAssets::class);
    $events->subscribe(Listener\FormatGithubAutolink::class);
    $events->subscribe(Listener\ResetJavascript::class);
};
