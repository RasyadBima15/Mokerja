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
        Schema::create('job_pelamars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobId');
            $table->unsignedBigInteger('profileId');
            $table->string('CV');
            $table->string('status')->default('waiting');

            $table->foreign('jobId')->references('id')->on('jobs');
            $table->foreign('profileId')->references('id')->on('profiles');
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
        Schema::dropIfExists('job_pelamars');
    }
};
