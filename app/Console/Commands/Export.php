<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Support\Crawler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Export extends Command
{
    protected $signature = 'export';
    protected $description = 'Export properties';

    public function handle()
    {
        $properties = (array) DB::table('properties')
            ->where('is_tailwind', true)
            ->selectRaw('count(utility) AS count, utility')
            ->groupBy('utility')
            ->orderBy('count', 'desc')
            ->get()
            ->pluck('utility')
            ->map(function ($item) {
                return "\\"."$item"."::class,";
            })
            ->join("\n");

        file_put_contents(base_path('export.txt'), $properties);
    }
}
