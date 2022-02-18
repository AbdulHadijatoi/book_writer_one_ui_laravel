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
        Schema::create('str_chapters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('chapter_type_id')->nullable();
            $table->integer('chapter_number')->nullable();
            $table->integer('chapter_position')->nullable();
            $table->string('chapter_title')->nullable();
            $table->string('chapter_location')->nullable();
            $table->string('chapter_characters')->nullable();
            $table->text('chapter_abstract')->nullable();
            $table->string('chapter_issues')->nullable();
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
        Schema::dropIfExists('str_chapters');
    }
};
