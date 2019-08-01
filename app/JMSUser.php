<?php

namespace App;

use MinecraftJP;

class JMSUser
{
  public static function getUser()
  {
    try {
      $minecraft_jp = new MinecraftJP(array(
          'clientId' => env('JMS_CLIENT_ID'),
          'clientSecret' => env('JMS_CLIENT_SECRET'),
          'redirectUri' => env('JMS_CALLBACK')
      ));
      return $minecraft_jp->getUser();
    } catch (\Exception $exception) {
      return null;
    }
  }

  /**
   * ユーザーがJMSにログインしているか返します。
   * @return bool true: ログインしている場合 / false: ログインしていない場合
   */
  public static function isLogin()
  {
    if (self::getUser()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * MinecraftIDを取得します。
   * JMSログイン下で呼び出して下さい。
   */
  public static function getMinecraftID()
  {
    assert(self::isLogin() == true, "getMinecraftIDはログイン下でしか呼び出されない");
    return self::getUser()['preferred_username'];
  }
}