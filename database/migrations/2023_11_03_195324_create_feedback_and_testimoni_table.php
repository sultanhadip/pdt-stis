<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackAndTestimoniTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('testimoni', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('id_user')->references('id')->on('users');
            $table->string('testimoni',500);
            $table->timestamps();
        });

        Schema::create('feedback', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('id_user')->references('id')->on('users');
            $table->string('feedback',500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
        Schema::dropIfExists('testiomoni');
    }
};
