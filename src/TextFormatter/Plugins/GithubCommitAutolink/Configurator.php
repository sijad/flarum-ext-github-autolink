<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\TextFormatter\Plugins\GithubCommitAutolink;

use s9e\TextFormatter\Plugins\ConfiguratorBase;

class Configurator extends ConfiguratorBase
{
    protected $regexp = '/(?:^|\\b)(?:https?\\:\\/\\/github\\.com\\/([\\w-]+\\/[\\w-]+)\\/commit\\/([0-9a-f]{7,40})|([\\w-]+\\/[\\w-]+)@([0-9a-f]{7,40}))/Si';
    protected $tagName = 'GITHUBCOMMIT';

    protected function setUp()
    {
        if (isset($this->configurator->tags[$this->tagName])) {
            return;
        }
        $tag = $this->configurator->tags->add($this->tagName);
        $tag->attributes->add('repo');
        $tag->attributes->add('commit');
        $this->resetTemplate();
    }

    public function getJSParser()
    {
        return \file_get_contents(realpath(__DIR__.'/Parser.js'));
    }

    protected function resetTemplate()
    {
        $template = '<a class="github-commit-link"><xsl:attribute name="href">';
        $template .= 'https://github.com/<xsl:value-of select="@repo"/>';
        $template .= '/commit/<xsl:value-of select="@commit"/></xsl:attribute>';
        $template .= '<xsl:value-of select="@repo"/>@<code><xsl:value-of select="substring(@commit, 1, 7)"/></code></a>';
        $this->getTag()->template = $template;
    }
}
