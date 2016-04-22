<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

use Sijad\GithubAutolink\Listener;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->subscribe(Listener\FormatGithubAutolink::class);
};
