<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crowdfounding extends Model
{
  protected $fillable = [
      'name',
      'minecraft_id',
      'discord_id',
      'description'
  ];

  public function donations()
  {
    $this->hasMany(Donation::class, 'crowdfunding_id', 'id');
  }
}
