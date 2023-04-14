<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'sitemap:generate';
    protected $description = 'Generating the sitemap for the site';
    public function handle()
    {
        SitemapGenerator::create('https://kabarundangan.com/')->writeToFile(public_path('sitemap.xml'));
        $this->info('The sitemap has been generated');
    }
}
