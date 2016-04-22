<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\TextFormatter\Plugins\GithubIssueAutolink;

use s9e\TextFormatter\Plugins\ConfiguratorBase;

class Configurator extends ConfiguratorBase
{
    protected $regexp = '/(?:^|\\b)(?:https?\\:\\/\\/github\\.com\\/([\\w-]+\\/[\\w-]+)\\/issues\\/(\\d+)|([\\w-]+\\/[\\w-]+)#(\\d+))/Si';
    protected $tagName = 'GITHUBISSUE';

    protected function setUp()
    {
        if (isset($this->configurator->tags[$this->tagName])) {
            return;
        }
        $tag = $this->configurator->tags->add($this->tagName);
        $tag->attributes->add('repo');
        $tag->attributes->add('issue');
        $this->resetTemplate();
    }

    public function getJSParser()
    {
        return \file_get_contents(realpath(__DIR__.'/Parser.js'));
    }

    protected function resetTemplate()
    {
        $template = '<a class="github-issue-link"><xsl:attribute name="href">';
        $template .= 'https://github.com/<xsl:value-of select="@repo"/>';
        $template .= '/issues/<xsl:value-of select="@issue"/></xsl:attribute>';
        $template .= '<xsl:value-of select="@repo"/>#<xsl:value-of select="@issue"/></a>';
        $this->getTag()->template = $template;
    }
}
