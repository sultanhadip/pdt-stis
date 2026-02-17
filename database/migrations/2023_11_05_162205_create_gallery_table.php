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
        Schema::create('gallery', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('filename');
            $table->string('title',150)->nullable();
            $table->text('caption')->nullable();
            $table->year('tahun')->nullable();
            $table->unsignedTinyInteger('urutan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery');
    }
};
