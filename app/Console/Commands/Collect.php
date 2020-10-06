<?php

namespace App\Console\Commands;

use App\Support\CollectCrawlObserver;
use GuzzleHttp\RequestOptions;
use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlInternalUrls;

class Collect extends Command
{
    protected $signature = 'collect';
    protected $description = 'Collects urls';

    public function handle()
    {
        $root = 'https://builtwithtailwind.com/';
        $this->info('Stating crawler');
        Crawler::create([RequestOptions::ALLOW_REDIRECTS => true])
            ->setDelayBetweenRequests(10)
            ->setParseableMimeTypes(['text/html'])
            ->setCrawlObserver(new CollectCrawlObserver())
            ->setCrawlProfile(new CrawlInternalUrls($root))
            ->startCrawling($root);
    }
}
