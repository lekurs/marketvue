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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('baseline', 255)->nullable();
            $table->text('description')->nullable();
            $table->dateTime('open_hours')->nullable();
            $table->dateTime('close_hours')->nullable();
            $table->string('siren', '9')->nullable()->unique();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('zip', '5')->nullable();
            $table->string('department', 2)->nullable();
            $table->string('city')->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('cellular', 10)->nullable();
            $table->string('email')->nullable()->unique();
            $table->boolean('active')->default(true);
            $table->boolean('show_informations')->default(true);
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 300)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreignId('activity_id')->nullable();
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
