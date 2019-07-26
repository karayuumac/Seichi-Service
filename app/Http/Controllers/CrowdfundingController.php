<?php

namespace App\Http\Controllers;

use App\Crowdfunding;
use App\Donation;
use App\Http\Requests\CrowdfundingRequest;
use App\Http\Requests\DonationRequest;
use App\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CrowdfundingController extends Controller
{
  public function about()
  {
    return view('crowdfunding.about', [
        'title' => 'クラウドファンディングとは'
    ]);
  }

  public function index()
  {
    $fundings = Crowdfunding::all();

    return view('crowdfunding.index', [
        'title' => 'クラウドファンディング一覧',
        'fundings' => $fundings
    ]);
  }

  public function create()
  {
    return view('crowdfunding.create', [
        'title' => 'クラウドファンディング作成'
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

  public function show($id)
  {
    $funding = Crowdfunding::find($id);

    if (is_null($funding)) {
      return redirect()->route('crowdfunding');
    }
    return view('crowdfunding.show', [
        'title' => "プロジェクトの詳細",
        'funding' => $funding
    ]);

  }

  public function support($id)
  {
    $funding = Crowdfunding::find($id);
    $servers = Server::orderBy('id', 'asc')->pluck('name', 'id');

    if (is_null($funding)) {
      return redirect()->route('crowdfunding');
    }
    return view('crowdfunding.support', [
        'title' => "プロジェクトに支援",
        'funding' => $funding,
        'servers' => $servers
    ]);
  }

  public function support_store($id, DonationRequest $request)
  {
    $inputs = $request->except('_token');
    $inputs['crowdfunding_id'] = $id;
    Donation::create($inputs);

    return redirect()->route('crowdfunding')
        ->with('flash_message', 'プロジェクトに支援しました。後日ガチャ券を回収しに伺います。');
  }
}
