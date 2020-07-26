<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->id();
            $table->text('commentary');
            $table->unsignedBigInteger('renter_id');
            $table->unsignedBigInteger('republic_id');
            $table->timestamps();
        });

        Schema::table('commentaries', function (Blueprint $table) {
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
        Schema::dropIfExists('commentaries');
    }
}
