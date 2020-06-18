<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('nid');
            $table->string('pass_num');
            $table->date('birth_date');
            $table->date('nissue_date');
            $table->string('gender');
            $table->string('mobile_number');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('email')->unique();
            $table->string('nationality');
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
        Schema::dropIfExists('candidate_personal_infos');
    }
}
