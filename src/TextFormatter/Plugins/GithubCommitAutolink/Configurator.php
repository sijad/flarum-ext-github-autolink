<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\TextFormatter\Plugins\GithubCommitAutolink;

use s9e\TextFormatter\Plugins\ConfiguratorBase;

class Configurator extends ConfiguratorBase
{
    protected $quickMatch = '@';
    protected $regexp = '/(?:^|\\b.+?|\\s)(@[0-9a-f]{7,40})/Si';
    protected $tagName = 'GITHUBCOMMIT';
    protected $repo = '';

    protected function setUp()
    {
        if (isset($this->configurator->tags[$this->tagName])) {
            return;
        }
        $this->configurator->tags->add($this->tagName);
        $this->resetTemplate();
    }

    public function setGithubRepo($repo)
    {
        $this->repo = $repo;
        $this->resetTemplate();
    }

    public function getJSParser()
    {
        return \file_get_contents(realpath(__DIR__.'/Parser.js'));
    }

    protected function resetTemplate()
    {
        if (!empty($this->repo)) {
            $template = '<a class="github-commit-link"><xsl:attribute name="href">';
            $template .= "https://github.com/{$this->repo}/commit/";
            $template .= '<xsl:value-of select="substring(./text(), 2)"/></xsl:attribute>';
            $template .= '@<code><xsl:value-of select="substring(./text(), 2, 7)"/></code></a>';
            $this->getTag()->template = $template;
        }
    }
}
