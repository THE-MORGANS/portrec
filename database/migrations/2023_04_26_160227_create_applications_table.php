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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('job_id')->constrained();
            $table->integer('cv_id')->nullable();
            $table->integer('cover_letter_id')->nullable();
            $table->text('portfolio_links')->nullable();
            $table->string('hiring_stage_id')->nullable();
            $table->dateTime('applied_date')->nullable();
            $table->string('status')->nullable();
            $table->text('answers')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_viewed')->nullable();
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
        Schema::dropIfExists('applications');
    }
};
