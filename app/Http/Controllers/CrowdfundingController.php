<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrowdfundingController extends Controller
{
  public function about()
  {
    return view('crowdfunding.about', [
        'title' => 'クラウドファンディングとは - 整地鯖非公式'
    ]);
  }

  public function index() {
    return view('crowdfunding.index', [
        'title' => 'クラウドファンディング一覧 - 整地鯖非公式'
    ]);
  }
}
