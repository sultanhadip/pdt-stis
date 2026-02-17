<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->foreignId('user_id')->constrained();
            $table->string('nim');
            $table->string('devisi')->length(50);
            $table->string('no_wa')->length(15);
            $table->string('link');
            $table->string('status_pendaftaran',500)->nullable()->default('Sedang Diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
};
