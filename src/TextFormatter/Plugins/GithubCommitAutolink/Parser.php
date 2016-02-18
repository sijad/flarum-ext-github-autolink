<?php

/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\GithubAutolink\TextFormatter\Plugins\GithubCommitAutolink;

use s9e\TextFormatter\Plugins\ParserBase;

class Parser extends ParserBase
{
    public function parse($text, array $matches)
    {
        $tagName = $this->config['tagName'];
        foreach ($matches as $m) {
            $this->parser->addSelfClosingTag($this->config['tagName'], $m[1][1], \strlen($m[1][0]));
        }
    }
}
