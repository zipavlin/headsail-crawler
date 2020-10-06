<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Support\Crawler;
use Illuminate\Console\Command;

class Add extends Command
{
    protected $signature = 'add {url}';
    protected $description = 'Adds url';

    private $url;

    public function handle(Crawler $crawler)
    {
        // find root url
        $this->url = Page::getUrlParts($this->argument('url'))->base;

        $this->info("Adding url {$this->url}");

        if (Page::whereUrl($this->url)->valid()->exists()) {
            $this->error("Page already exists");
            return;
        }

        // start crawler
        $this->info("Starting crawler");
        $crawler->start($this->url);
        $this->info("Crawling done");
    }
}
