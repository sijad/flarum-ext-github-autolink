<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\TextFormatter\Plugins\GithubIssueAutolink;

use s9e\TextFormatter\Plugins\ConfiguratorBase;

class Configurator extends ConfiguratorBase
{
    protected $quickMatch = '#';
    protected $regexp = '/(?:^|\\b.+?|\\s)(#\\d+)/Si';
    protected $tagName = 'GITHUBISSUE';
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
            $template = '<a class="github-issue-link"><xsl:attribute name="href">';
            $template .= "https://github.com/{$this->repo}/issues/";
            $template .= '<xsl:value-of select="substring(./text(), 2)"/></xsl:attribute>';
            $template .= '<xsl:apply-templates/></a>';
            $this->getTag()->template = $template;
        }
    }
}
