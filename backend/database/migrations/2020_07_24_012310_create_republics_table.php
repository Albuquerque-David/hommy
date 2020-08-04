<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('state');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('address');
            $table->string('bathrooms');
            $table->string('allowedTo');
            $table->string('value');
            $table->double('rating');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('tenant_id');
            $table->timestamps();
        });

        Schema::table('republics', function (Blueprint $table) {
            $table->softDeletes();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
