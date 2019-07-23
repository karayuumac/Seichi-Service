<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InquiryTypesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $names = [
        ['name' => 'お問い合わせ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['name' => 'ご意見ご感想', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    ];

    DB::table('inquiry_types')->insert($names);
  }
}
