<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrowdfundingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('crowdfundings', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->string('minecraft_id');
      $table->string('discord_id')->nullable();
      $table->text('description');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('crowdfundings');
  }
}
