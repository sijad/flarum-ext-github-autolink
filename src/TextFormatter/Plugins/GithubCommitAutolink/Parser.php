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
            $tag = $this->parser->addSelfClosingTag(
                $tagName,
                $m[0][1],
                \strlen($m[0][0]),
                -10
            );
            $tag->setAttributes(
                [
                    'repo' => $m[1][1] >= 0 ? $m[1][0] : $m[3][0],
                    'commit' => $m[2][1] >= 0 ? $m[2][0] : $m[4][0],
                ]
            );
        }
    }
}
