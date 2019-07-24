<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
  protected $fillable = [
      'minecraft_id',
      'discord_id',
      'donation_amount',
      'crowdfunding_id'
  ];
}
