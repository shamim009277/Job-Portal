<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateCareerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_career_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employers_id');
            $table->text('Objective');
            $table->integer('psalary');
            $table->integer('exsalary');
            $table->string('joblavel');
            $table->string('jobnature');
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
        Schema::dropIfExists('candidate_career_infos');
    }
}
