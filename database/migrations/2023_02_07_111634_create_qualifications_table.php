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
        Schema::create('qualifications', function (Blueprint $table) {
            //candidate qualifications  type, BSc, HND, BEd etc
            $table->id();
            $table->string('name')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        $data = [
            "name" => "Bachelors Degree",
            "status" => "1",
        ];

        DB::table('qualifications')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
};
