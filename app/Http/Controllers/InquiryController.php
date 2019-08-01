<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Inquiry;
use App\InquiryType;
use App\JMSUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Session;

class InquiryController extends Controller
{
  public function form()
  {
    if (!JMSUser::isLogin()) {
      Session::put('callback_url', route('contact'));
      return redirect()->route('jms_login');
    }

    $inquiry_types = InquiryType::orderBy('id', 'asc')->pluck('name', 'id');

    return view('inquiry.create', [
        'title' => 'お問い合わせ',
        'inquiry_types' => $inquiry_types
    ]);
  }

  public function process(InquiryRequest $request)
  {
    \Request::setTrustedProxies(['127.0.0.1', $request->server->get('REMOTE_ADDR')],
        Request::HEADER_X_FORWARDED_ALL);

    $inputs = $request->except('_token');
    $inputs['ip'] = $request->ip();
    $inputs['minecraft_id'] = JMSUser::getMinecraftID();

    //保存操作
    Inquiry::create($inputs);

    return view('inquiry.complete', [
        'title' => '送信終了'
    ]);
  }
}
