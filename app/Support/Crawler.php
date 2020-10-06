<?php

namespace App\Support;

use GuzzleHttp\RequestOptions;
use Spatie\Crawler\CrawlInternalUrls;
use Spatie\Crawler\Crawler as BaseCrawler;

class Crawler
{
    public $crawler;

    /**
     * Spider constructor.
     * @param int $depth
     * @param int $delay
     * @param int $max
     */
    public function __construct(int $depth = 3, int $delay = 150, int $max = 15)
    {
        $this->crawler = BaseCrawler::create([RequestOptions::ALLOW_REDIRECTS => true])
            ->setMaximumDepth($depth)
            ->setDelayBetweenRequests($delay)
            ->setParseableMimeTypes(['text/html'])
            ->setCrawlObserver(new CrawlObserver())
            ->setMaximumCrawlCount($max);
    }

    public function start($url): BaseCrawler
    {
        $this->crawler
            ->setCrawlProfile(new CrawlInternalUrls($url))
            ->startCrawling($url);

        return $this->crawler;
    }
}
