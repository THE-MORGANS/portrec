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
        Schema::create('job_functions', function (Blueprint $table) {
            //jobs functionalities
            $table->id();
            $table->unsignedInteger('industries_id');
            // $table->foreignId('industries_id')->constrained();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        $data = [
            "industries_id"=> "1",
            "name"=> "Fullstack Developer"
        ];

        DB::table('job_functions')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_functions');
    }
};
