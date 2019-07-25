<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $servers = [
        ['name' => 'アルカディアサーバ(s1)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['name' => 'エデンサーバ(s2)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['name' => 'ヴァルハラサーバ(s3)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    ];

    DB::table('servers')->insert($servers);
  }
}
