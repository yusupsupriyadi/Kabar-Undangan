<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating the sitemap for the site';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // add your URLs here
        $sitemap->add(Url::create('https://kabarundangan.com/'));
        $sitemap->add(Url::create('https://kabarundangan.com/login'));
        $sitemap->add(Url::create('https://kabarundangan.com/cara-membuat-undangan'));
        $sitemap->add(Url::create('https://kabarundangan.com/FAQ'));
        

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('The sitemap has been generated');

        return 0;
    }
}
