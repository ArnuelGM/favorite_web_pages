<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('favorite_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamp('created_at', 0)->nullable();
            $table->foreign('favorite_id')->references('id')->on('favorites');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorite_categories', function (Blueprint $table) {
            $table->dropForeign(['favorite_id']);
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('favorite_categories');
    }
}
