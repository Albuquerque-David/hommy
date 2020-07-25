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
            $table->unsignedBigInteger('fk_renter');
            $table->unsignedBigInteger('fk_republic');
            $table->primary(['fk_renter','fk_republic']);
            $table->timestamps();
        });

        Schema::table('favourites', function (Blueprint $table) {
            $table->foreign('fk_renter')->references('id')->on('renters')->onDelete('cascade');
            $table->foreign('fk_republic')->references('id')->on('republics')->onDelete('cascade');
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
