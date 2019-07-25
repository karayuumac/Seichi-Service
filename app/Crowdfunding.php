<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crowdfunding extends Model
{
  protected $fillable = [
      'name',
      'minecraft_id',
      'discord_id',
      'description',
      'target_amount',
      'deadline'
  ];

  public function donations()
  {
    $this->hasMany(Donation::class, 'crowdfunding_id', 'id');
  }
}
