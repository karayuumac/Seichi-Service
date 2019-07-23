<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command {
  protected $signature = 'create_sitemap';

  protected $description = 'Generate the sitemap';

  public function handle() {
    SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
  }
}