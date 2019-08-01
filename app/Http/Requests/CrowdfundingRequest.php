<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrowdfundingRequest extends FormRequest
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
        'name' => 'required',
        'description' => 'required',
        'target_amount' => 'integer|min:1',
        'deadline' => 'after:now',
        'discord_id' => 'required|discord_id'
    ];
  }

  public function attributes()
  {
    return [
        'name' => 'プロジェクト名',
        'description' => 'プロジェクトの説明',
        'target_amount' => '必要支援額',
        'deadline' => '期限',
        'discord_id' => 'Discordユーザー名'
    ];
  }
}
