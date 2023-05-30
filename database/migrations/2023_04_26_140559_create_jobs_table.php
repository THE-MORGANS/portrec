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
        Schema::create('jobs', function (Blueprint $table) {
            //jobs posted by the recuiter 
            $table->id();
            $table->foreignId('recruiter_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->string('title')->nullable();
            $table->string('job_functions')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('location')->nullable();
            $table->foreignId('work_type_id')->constrained();
            $table->string('experience')->nullable();
            $table->string('term')->nullable();
            $table->double('min_salary')->nullable();
            $table->double('max_salary')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
