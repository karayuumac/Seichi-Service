<?php

namespace App;

use Carbon\Carbon;
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
    return $this->hasMany(Donation::class, 'crowdfunding_id', 'id')->get();
  }

  public function carbonDeadLine() {
    return Carbon::parse($this->deadline);
  }

  public function currentAmount() {
    $sum = 0;
    foreach ($this->donations() as $donation) {
      $sum += $donation->donation_amount;
    }
    return $sum;
  }

  public function isExpired() {
    return $this->carbonDeadLine() < Carbon::now();
  }
}
