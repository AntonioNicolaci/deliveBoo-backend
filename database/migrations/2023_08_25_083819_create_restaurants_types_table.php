<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants_types', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurants_id');
            $table->foreign('restaurants_id')->references('id')->on('restaurants');

            $table->unsignedBigInteger('types_id');
            $table->foreign('types_id')->references('id')->on('types');            

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
        Schema::dropIfExists('restaurants_types');
    }
};
