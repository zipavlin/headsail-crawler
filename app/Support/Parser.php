<?php

namespace App\Support;

use Symfony\Component\DomCrawler\Crawler;

class Parser extends Crawler
{
    public function getClassObjects()
    {
        $nodes = [];
        $this
            ->filter('[class]:not(script):not(noscript)')
            ->each(static function (Crawler $node) use (&$nodes) {
                $nodes[] = (object) [
                    'name' => $node->nodeName(),
                    'class' => $node->attr('class')
                ];
            });

        return collect($nodes);
    }
}
