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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('physical_description')->nullable();
            $table->string('summery')->nullable();
            $table->string('skills')->nullable();
            $table->string('history')->nullable();
            $table->string('evolution')->nullable();
            $table->string('motivation')->nullable();
            $table->string('additional_information')->nullable();
            $table->integer('book_id')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
