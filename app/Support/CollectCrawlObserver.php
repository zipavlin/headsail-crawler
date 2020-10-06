<?php


namespace App\Support;

use App\Models\Candidate;
use App\Models\Page;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Crawler\CrawlObserver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\DomCrawler\Crawler;

class CollectCrawlObserver extends CrawlObserver
{

    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null)
    {
        if (strpos($url, 'https://builtwithtailwind.com/site/') !== false) {
            $parser = new Crawler((string)$response->getBody());
            $urls = [];
            $parser
                ->filter('a[href^="https://builtwithtailwind.com/visit/"][rel="nofollow"][class="no-underline flex items-center mb-6 px-3 py-2 bg-white transition rounded-lg shadow-lg hover:shadow hover:-translateY-sm"]')
                ->each(static function (Crawler $node) use (&$urls) {
                    $node->filter('span[class="font-bold text-black text-sm truncate"]')
                        ->each(static function (Crawler $node) use (&$urls) {
                            if (strpos(trim($node->text(), '/'), '/') === false) {
                                $urls[] = ['url' => $node->text()];
                            }
                        });
                });
            DB::table('candidates')->insertOrIgnore(array_unique($urls));
        }
    }

    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null)
    {

    }
}
