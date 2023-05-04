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
        Schema::create('companies', function (Blueprint $table) {
            //when a recuiter creates an account, they must create a company profile before the can post jobs, 
            //each company hold the jobs posted under them
            //the recuiter can subscription covers for all the company listed in their account
            
            $table->id();
            $table->foreignId('recuiter_id')->constrained();
            $table->string('name')->nullable();
            $table->string('cac')->nullable();
            $table->integer('company_type_id')->nullable();
            $table->string('company_industry')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
