<?php

namespace App\Support;

use App\Models\Node;
use App\Models\Page;
use App\Models\Property;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObserver as BaseCrawlObserver;
use Zipavlin\Headsail\Headsail;

class CrawlObserver extends BaseCrawlObserver
{

    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null): void
    {
        // make page
        if (Page::valid()->whereUrl(Page::getUrlParts((string) $url)->full)->exists()) {
            return;
        }

        $page = new Page();
        $page->url = (string) $url;
        $page->crawled_at = date("Y-m-d H:i:s");
        $page->save();

        // get nodes
        $class_parser = new Headsail();
        $parser = new Parser((string) $response->getBody());
        $parser->getClassObjects()->each(static function ($node_object) use ($class_parser, $page) {
            $node = new Node(['name' => $node_object->name]);
            $page->nodes()->save($node);

            // set properties
            $properties = [];
            foreach (explode(' ', preg_replace("/\s+/", " ", str_replace(["\n", "\r"], " ", trim($node_object->class)))) as $class) {
                $property = new Property([
                    'class' => $class
                ]);
                // split variant and prop
                if (preg_match("/^(?:(?<variant>(?:[\w\-]+:?)+):)?(?<property>[\w\-\/]+)$/", $class, $matches)) {
                    $property->variant = (array_key_exists('variant', $matches) && !empty($matches['variant'])) ? explode(':', $matches['variant']) : null;
                    if (array_key_exists('property', $matches) && ($result = $class_parser->evaluate($matches['property']))) {
                        $property->utility = $result->utility;
                    }
                }
                $properties[] = $property;
            }
            $node->properties()->saveMany($properties);
        });
    }

    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null): void
    {
        // add failed page to database
        echo "failed $url\n";
    }
}
