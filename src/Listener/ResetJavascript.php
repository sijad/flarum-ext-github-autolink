<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\Listener;

use Flarum\Event\SettingWasSet;
use Flarum\Foundation\Application;
use Illuminate\Contracts\Events\Dispatcher;

class ResetJavascript
{
    /**
     * @var \Flarum\Foundation\Application
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(SettingWasSet::class, [$this, 'resetJavascript']);
    }

    /**
     * @param SettingWasSet $event
     */
    public function resetJavascript(SettingWasSet $event)
    {
        if ($event->key == 'sijad-github-autolink.repository') {
            $this->app->make('flarum.formatter')->flush();
        }
    }
}
