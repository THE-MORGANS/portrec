<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('languages')->nullable();
            $table->string('industries_id')->nullable();
            $table->string('allow_search')->nullable();
            $table->string('user_level')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->text('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $user = [
            "name"=> "Portrec User",
            "email"=> "portrec.user1@gmail.com",
            "password"=> bcrypt('12345'),
        ];

        DB::table('users')->insert($user);
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
};
