<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CustomValidator;

class ValidatorServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    \Validator::resolver(function ($translator, $data, $rules, $message, $attributes) {
      return new CustomValidator($translator, $data, $rules, $message, $attributes);
    });
  }
}
