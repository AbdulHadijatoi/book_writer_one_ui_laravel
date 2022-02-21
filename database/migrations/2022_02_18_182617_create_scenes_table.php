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
        Schema::create('scenes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('scene_number')->nullable();
            $table->string('scene_location')->nullable();
            $table->string('scene_characters')->nullable();
            $table->string('scene_issues')->nullable();
            $table->string('scene_abstract')->nullable();
            $table->index('str_chapter_id');
            $table->foreignId('str_chapter_id')->constrained('str_chapters')->onUpdate('cascade')->onDelete('cascade');
            $table->index('book_id');
            $table->foreignId('book_id')->constrained('books')->onUpdate('cascade')->onDelete('cascade');
            $table->index('user_id');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenes');
    }
};
