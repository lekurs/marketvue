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
        Schema::create('opendays', function (Blueprint $table) {
            $table->foreignId('shop_id');
            $table->boolean('Mon')->default(false);
            $table->boolean('Tue')->default(false);
            $table->boolean('Wed')->default(false);
            $table->boolean('Thu')->default(false);
            $table->boolean('Fri')->default(false);
            $table->boolean('Sat')->default(false);
            $table->boolean('Sun')->default(false);
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
        Schema::dropIfExists('opendays');
    }
};
