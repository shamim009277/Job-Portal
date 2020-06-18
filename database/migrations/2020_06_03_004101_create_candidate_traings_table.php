<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateTraingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_traings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id');
            $table->string('training_title');
            $table->string('country');
            $table->string('topic');
            $table->integer('year');
            $table->string('institute');
            $table->integer('duration');
            $table->string('location');
            $table->date('start_time');
            $table->date('end_time');
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
        Schema::dropIfExists('candidate_traings');
    }
}
