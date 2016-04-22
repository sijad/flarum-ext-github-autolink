<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\Listener;

use Flarum\Event\ConfigureFormatter;
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
        $events->listen(ConfigureFormatter::class, [$this, 'addGithubAutokinkFormatter']);
    }

    /**
     * @param ConfigureFormatter $event
     */
    public function addGithubAutokinkFormatter(ConfigureFormatter $event)
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
