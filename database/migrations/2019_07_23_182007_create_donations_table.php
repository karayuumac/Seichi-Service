<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('donations', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('minecraft_id');
      $table->string('discord_id')->nullable();
      $table->integer('donation_amount')->unsigned();
      $table->integer('crowdfunding_id')->unsigned();
      $table->foreign('crowdfunding_id')->references('id')
          ->on('crowdfundings')->onDelete('restrict');
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
    Schema::dropIfExists('donations');
  }
}
