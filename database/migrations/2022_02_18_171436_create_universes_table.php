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
        Schema::create('universes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('origins_and_location')->nullable();
            $table->text('miscellaneous_information')->nullable();
            $table->string('rules_and_limits')->nullable();
            $table->text('content')->nullable();
            $table->string('technical_terms_jargons')->nullable();
            $table->index('universe_type_id');
            $table->foreignId('universe_type_id')->constrained('universe_types')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('universes');
    }
};
