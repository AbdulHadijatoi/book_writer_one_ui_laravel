<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password');
            // $table->index('role_id');
            // $table->integer('role_id')->constrained('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('role_id')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('fullname')->nullable();
            $table->string('gender')->nullable();
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
