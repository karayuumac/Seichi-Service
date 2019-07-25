<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
  public function xml()
  {
    $sitemap = \App::make("sitemap");
    $now = Carbon::now();
    $sitemap->add(route('index'), $now, '1.0', 'daily');
    $sitemap->add(route('crowdfunding.about'), $now, '0.8', 'monthly');
    $sitemap->add(route('policy'), $now, '0.8', 'monthly');
    $sitemap->add(route('contact'), $now, '0.8', 'always');
    $sitemap->add(route('crowdfunding'), $now, '0.8', 'always');
    $sitemap->add(route('crowdfunding.create'), $now, '0.8', 'always');

    return $sitemap->render('xml');
  }
}
