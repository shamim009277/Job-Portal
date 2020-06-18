<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('password2');
            $table->string('company_name');
            $table->text('company_address');
            $table->string('industary_type');
            $table->text('business_description');
            $table->string('company_licen');
            $table->string('company_rl');
            $table->string('company_web');
            $table->string('con_per_name');
            $table->string('con_per_designation');
            $table->string('con_per_email')->unique();
            $table->string('con_per_mobile');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('employers');
    }
}
