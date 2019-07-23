<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'minecraft_id' => 'required',
      'discord_id' => 'discord_id',
      'content' => 'required'
    ];
  }

  public function attributes()
  {
    return [
      'minecraft_id' => 'Minecraft ID',
      'discord_id' => 'Discord ID',
      'content' => 'お問い合わせ内容'
    ];
  }
}
