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
        'title' => 'お問い合わせ',
        'inquiry_types' => $inquiry_types
    ]);
  }

  public function process(InquiryRequest $request)
  {
    //保存操作
    Inquiry::create($request->except('_token'));

    return view('inquiry.complete', [
        'title' => '送信終了'
    ]);
  }
}
