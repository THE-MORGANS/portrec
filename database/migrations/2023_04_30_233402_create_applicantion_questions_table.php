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
        Schema::create('applicantion_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruiter_id')->nullable();
            $table->foreignId('application_id')->nullable();
            $table->text('questions')->nullable();
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
        Schema::dropIfExists('applicantion_questions');
    }
};
