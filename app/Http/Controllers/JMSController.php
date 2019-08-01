<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MinecraftJP;
use Session;

class JMSController extends Controller
{
  public function login()
  {
    $minecraft_jp = new MinecraftJP(array(
        'clientId' => env('JMS_CLIENT_ID'),
        'clientSecret' => env('JMS_CLIENT_SECRET'),
        'redirectUri' => env('JMS_CALLBACK')
    ));

    $login_url = $minecraft_jp->getLoginUrl();
    return redirect()->to($login_url);
  }

  public function callback()
  {
    try {
      $minecraft_jp = new MinecraftJP(array(
          'clientId' => env('JMS_CLIENT_ID'),
          'clientSecret' => env('JMS_CLIENT_SECRET'),
          'redirectUri' => env('JMS_CALLBACK')
      ));
      $minecraft_jp->getUser();
    } catch (\Exception $exception) {
      return redirect()->route('jms_login');
    }

    $callback_url = Session::get('callback_url');
    if (empty($callback_url)) {
      $callback_url = route('index');
    } else {
      Session::forget('callback_url');
    }
    return redirect()->to($callback_url);
  }

  public function logout() {
    try {
      $minecraft_jp = new MinecraftJP(array(
          'clientId' => env('JMS_CLIENT_ID'),
          'clientSecret' => env('JMS_CLIENT_SECRET'),
          'redirectUri' => env('JMS_CALLBACK')
      ));
      $minecraft_jp->logout();
    } catch (\Exception $exception) {
      return redirect()->route('jms_login');
    }
    return redirect()->route('index');
  }
}
