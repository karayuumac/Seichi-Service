<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('inquiries', function (Blueprint $table) {
      $table->bigIncrements('id');
      //お問い合わせ種別
      $table->integer('type_id')->unsigned();
      $table->foreign('type_id')->references('id')
          ->on('inquiry_types')->onDelete('restrict');
      $table->string('minecraft_id');
      $table->string('discord_id')->nullable();
      $table->text('content');
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
    Schema::dropIfExists('inquiries');
  }
}
