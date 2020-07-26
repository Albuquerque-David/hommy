<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('renter_id');
            $table->unsignedBigInteger('republic_id');
            $table->timestamps();
        });

        Schema::table('favourites', function (Blueprint $table) {
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('cascade');
            $table->foreign('republic_id')->references('id')->on('republics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourites');
    }
}
