<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\Listener;

use Flarum\Formatter\Event\Configuring;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;

class FormatGithubAutolink
{
    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    /**
     * @param SettingsRepositoryInterface $settings
     */
    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Configuring::class, [$this, 'addGithubAutokinkFormatter']);
    }

    /**
     * @param Configuring $event
     */
    public function addGithubAutokinkFormatter(Configuring $event)
    {
        foreach (['CommitAutolink', 'IssueAutolink'] as $plugin) {
            $name = "Github{$plugin}";
            $event->configurator->plugins->set(
                $name,
                "Sijad\\GithubAutolink\\TextFormatter\\Plugins\\{$name}\\Configurator"
            );
        }
    }
}
