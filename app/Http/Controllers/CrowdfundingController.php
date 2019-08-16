<?php

namespace App\Http\Controllers;

use App\Crowdfunding;
use App\Donation;
use App\Http\Requests\CrowdfundingRequest;
use App\Http\Requests\DonationRequest;
use App\JMSUser;
use App\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

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
    $filtered_fundings = $fundings->filter(function ($f) {
      return !$f->isExpired();
    });

    return view('crowdfunding.index', [
        'title' => 'クラウドファンディング一覧',
        'fundings' => $filtered_fundings
    ]);
  }

  public function create()
  {
    if (!JMSUser::isLogin()) {
      Session::put('callback_url', route('crowdfunding.create'));
      return redirect()->route('jms_login');
    }

    return view('crowdfunding.create', [
        'title' => 'クラウドファンディング作成'
    ]);
  }

  public function store(CrowdfundingRequest $request)
  {
    Crowdfunding::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'minecraft_id' => JMSUser::getMinecraftID(),
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
    $donations = $funding->donations();

    if (is_null($funding)) {
      return redirect()->route('crowdfunding');
    }
    return view('crowdfunding.show', [
        'title' => "プロジェクトの詳細",
        'funding' => $funding,
        'donations' => $donations
    ]);

  }

  public function support($id)
  {
    $funding = Crowdfunding::find($id);
    if (is_null($funding)) {
      return redirect()->route('crowdfunding');
    }

    $servers = Server::orderBy('id', 'asc')->pluck('name', 'id');

    if ($funding->isExpired()) {
      return redirect()->route('crowdfunding')
          ->with('flash_message_error', '支援しようとしたプロジェクトは既に期限切れです。');
    }
    if (!JMSUser::isLogin()) {
      Session::put('callback_url', route('crowdfunding.support', $id));
      return redirect()->route('jms_login');
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
    $inputs['minecraft_id'] = JMSUser::getMinecraftID();
    Donation::create($inputs);

    return redirect()->route('crowdfunding')
        ->with('flash_message', 'プロジェクトに支援しました。後日ガチャ券を回収しに伺います。');
  }
}
