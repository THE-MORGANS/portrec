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
        Schema::create('work_experiences', function (Blueprint $table) {
            //candidates work experience 
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('company_name')->nullable();
            $table->string('company_location')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_level')->nullable();
            $table->foreignId('industries_id')->nullable();
            $table->foreignId('job_function_id')->constrained();
            $table->string('salary_range')->nullable();
            $table->foreignId('work_type_id')->constrained();
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('work_experiences');
    }
};
