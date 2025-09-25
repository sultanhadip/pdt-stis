<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createDonationsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->foreignId('user_id')->constrained();
            $table->integer('nominal')->unsigned();
            $table->string('link');
            $table->string('pesan',500)->nullable();
            $table->string('nama',500)->nullable()->default('Anonymous');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
