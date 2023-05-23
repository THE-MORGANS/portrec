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
        Schema::create('work_types', function (Blueprint $table) {
            //work types - remote, full time or contract
            $table->id();
            $table->string('name')->nullable();
            $table->integer('status')->nullable(0);
            $table->timestamps();
        });

        $data = [
            "name"=> "Full Time",
            "status"=> "1"
        ];

        DB::table('work_types')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_types');
    }
};
