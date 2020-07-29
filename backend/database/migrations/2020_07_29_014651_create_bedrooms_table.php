<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedrooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('republic_id');
            $table->timestamps();
        });

        Schema::table('bedrooms', function (Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics')->onDelete('cascade');
        });

        Schema::table('renters', function (Blueprint $table) {
            $table->foreign('bedroom_id')->references('id')->on('bedrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renters', function($table)
        {
            $table->dropForeign('renters_bedroom_id_foreign');
            $table->dropColumn('bedroom_id');
        });
        Schema::dropIfExists('bedrooms');
    }
}
