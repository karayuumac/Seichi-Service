<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
  protected $fillable = [
      'type_id',
      'minecraft_id',
      'discord_id',
      'content',
      'ip'
  ];

  public function inquiry_type()
  {
    return $this->hasOne(InquiryType::class, 'id', 'type_id');
  }
}
