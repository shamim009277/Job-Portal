<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employers_id');
            $table->string('job_title');
            $table->string('job_location');
            $table->string('email')->unique();
            $table->integer('job_vacancy');
            $table->string('job_category');
            $table->longText('job_description');
            $table->longText('job_responsibilities');
            $table->text('educational_requirements');
            $table->string('employment_status');
            $table->string('experience_requirements');
            $table->longText('additional_requirements');
            $table->longText('other_benefits');
            $table->date('application_deadline');
            $table->date('published_date');
            $table->integer('salary');
            $table->string('logo');
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
        Schema::dropIfExists('job_posts');
    }
}
