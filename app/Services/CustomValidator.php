<?php

namespace App\Services;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
  /**
   * DiscordIDのバリデーション.
   * 空文字・nullは許容し、入力時は#が含まれているか確認する.
   *
   * @param $attribute
   * @param $value
   * @param $parameters
   * @return bool
   */
  public function validateDiscordId($attribute, $value, $parameters)
  {
    if (!$value) {
      return true;
    }
    if (!preg_match('/#\d+$/', $value)) {
      return false;
    }
    return true;
  }
}