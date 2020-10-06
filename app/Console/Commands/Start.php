<?php

namespace App\Console\Commands;

use App\Models\Candidate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Start extends Command
{
    protected $signature = 'start';
    protected $description = 'Start parsing candidates';

    public function handle()
    {
        $total = Candidate::whereCrawled(false)->count();
        foreach (Candidate::whereCrawled(false)->get() as $index => $candidate) {
            DB::table('candidates')->where('id', $candidate->id)->update(['crawled' => 1]);
            $this->info("Starting ".($index+1)." of $total");
            $this->call('add', ['url' => $candidate->url]);
        }
    }
}
