<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();
            $table->timestamps();

            // Foreign key setting
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            // Do not allow duplication of combination of shop_id and tag_id
            $table->unique(['shop_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_tag');
    }
}