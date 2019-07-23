<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Inquiry;
use App\InquiryType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InquiryController extends Controller
{
  public function form()
  {
    $inquiry_types = InquiryType::orderBy('id', 'asc')->pluck('name', 'id');

    return view('inquiry.create', [
        'title' => 'お問い合わせ - 整地鯖非公式',
        'inquiry_types' => $inquiry_types
    ]);
  }

  /*
  public function confirm(InquiryRequest $request)
  {
    $inquiry_types = InquiryType::orderBy('id', 'asc')->pluck('name', 'id');
    $inquiry = new Inquiry($request->all());

    return view('inquiry.confirm', [
        'title' => 'お問い合わせ・確認 - 整地鯖非公式',
        'inquiry_types' => $inquiry_types,
        'inquiry' => $inquiry
    ]);
  }
  */

  public function process(InquiryRequest $request)
  {
    /*
    $action = $request->get('action');

    if ($action === '送信') {
      //保存操作 */
    Inquiry::create([
        'type_id' => $request->input('type_id'),
        'minecraft_id' => $request->input('minecraft_id'),
        'discord_id' => $request->input('discord_id'),
        'content' => $request->input('content')
    ]);
    return view('inquiry.complete', [
        'title' => '送信終了 - 整地鯖非公式'
    ]);
    /*
    } else {
      return redirect()->route('contact');
    }*/
  }
}
