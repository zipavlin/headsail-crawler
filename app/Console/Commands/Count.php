<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Support\Crawler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Count extends Command
{
    protected $signature = 'count';
    protected $description = 'Counts properties';

    public function handle()
    {
        $properties = (array) DB::table('properties')
            ->where('is_tailwind', true)
            ->selectRaw('count(utility) AS count, utility')
            ->groupBy('utility')
            ->orderBy('count', 'desc')
            ->get()
            ->map(static function ($item) {
                return [
                    (string) Str::of($item->utility)->afterLast('\\'),
                    $item->utility,
                    $item->count
                ];
            })
            ->toArray();
        $this->info("Showing results based on " . Page::count() . " pages.");
        $this->table(['Short', 'Long', 'Count'], $properties);
    }
}
