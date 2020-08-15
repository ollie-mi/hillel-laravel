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
            $table->string('login', 100);
            $table->string('password', 100);
            $table->string('email', 100)->unique();
            $table->enum('status', ['ON', 'OFF'])->default('ON');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->index(['login', 'password']);
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
