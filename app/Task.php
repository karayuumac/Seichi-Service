<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  const STATUS = [
      1 => ['label' => '未着手', 'class' => "badge-danger"],
      2 => ['label' => '着手中', 'class' => "badge-info"],
      3 => ['label' => '終了', 'class' => ""],
  ];

  public function getStatusLabelAttribute() {
    $status = $this->attributes['status'];

    if (!isset(self::STATUS[$status])) {
      return "";
    }

    return self::STATUS[$status]['label'];
  }

  public function getStatusClassAttribute() {
    $status = $this->attributes['status'];

    if (!isset(self::STATUS[$status])) {
      return "";
    }

    return self::STATUS[$status]['class'];
  }
}
