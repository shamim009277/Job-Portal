<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_employment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id');
            $table->string('company_name');
            $table->string('company_business');
            $table->string('designation');
            $table->text('responsibilities');
            $table->string('department');
            $table->text('company_location');
            $table->date('join_time');
            $table->date('resign_time');
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
        Schema::dropIfExists('candidate_employment_histories');
    }
}
