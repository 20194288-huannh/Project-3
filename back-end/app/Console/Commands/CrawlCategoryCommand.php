<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrawlCategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:crawl-category {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot = new \App\Scraper\CrawlCategory($this->arguments('url')['url']);
        $bot->scrape();
    }
}
