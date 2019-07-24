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
    $sitemap->add(url('/'), $now, '1.0', 'daily');
    $sitemap->add(url('/crowdfunding/about'), $now, '0.8', 'monthly');
    $sitemap->add(url('/policy'), $now, '0.8', 'monthly');
    $sitemap->add(url('/contact'), $now, '0.8', 'always');
    $sitemap->store('xml', 'sitemap');

    return $sitemap->render('xml');
  }
}
