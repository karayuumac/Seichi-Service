<?php

namespace App\Http\Controllers;

use App\Crowdfunding;
use App\Http\Requests\CrowdfundingRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CrowdfundingController extends Controller
{
  public function about()
  {
    return view('crowdfunding.about', [
        'title' => 'クラウドファンディングとは - 整地鯖非公式'
    ]);
  }

  public function index()
  {
    $fundings = Crowdfunding::all();

    return view('crowdfunding.index', [
        'title' => 'クラウドファンディング一覧 - 整地鯖非公式',
        'fundings' => $fundings
    ]);
  }

  public function create()
  {
    return view('crowdfunding.create', [
        'title' => 'クラウドファンディング作成 - 整地鯖非公式s'
    ]);
  }

  public function store(CrowdfundingRequest $request)
  {
    Crowdfunding::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'minecraft_id' => $request->input('minecraft_id'),
        'discord_id' => $request->input('discord_id'),
        'deadline' => Carbon::parse($request->input('deadline')),
        'target_amount' => $request->input('target_amount')
    ]);

    return redirect()->route('crowdfunding')
        ->with('flash_message', 'プロジェクトを作成しました。');
  }

  public function show($id) {
    $funding = Crowdfunding::find($id);

    return view('crowdfunding.show', [
        'title' => "プロジェクトの詳細",
        'funding' => $funding
    ]);
  }
}
