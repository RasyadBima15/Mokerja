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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('fotoProfil');
            $table->string('Place');
            $table->string('Specialist');
            $table->string('email');
            $table->string('noTelp');
            $table->integer('umur');
            $table->string('gender');
            $table->longText('riwayatStudi');
            $table->longText('descSelf');
            $table->longText('skill');
            $table->string('certificate');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
};
