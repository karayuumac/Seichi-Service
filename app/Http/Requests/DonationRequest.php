<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
        'donation_amount' => 'integer|min:1',
        'x' => 'integer',
        'y' => 'integer',
        'z' => 'integer',
        'minecraft_id' => 'required',
        'discord_id' => 'required|discord_id'
    ];
  }

  public function attributes()
  {
    return [
        'donation_amount' => '支援額',
        'x' => 'x座標',
        'y' => 'y座標',
        'z' => 'z座標',
        'minecraft_id' => 'Minecraft ID',
        'discord_id' => 'Discordユーザー名'
    ];
  }
}
