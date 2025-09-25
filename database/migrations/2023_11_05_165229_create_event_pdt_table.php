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
        Schema::create('event_pdt', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('title', 150);
            $table->text('description');
            $table->smallInteger('quota');
            $table->string('lokasi', 150);
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_akhir')->nullable();
            $table->timestamps();
        });
        Schema::create('volunteer_join_events', function (Blueprint $table) {
            $table->unsignedMediumInteger('event_id');
            $table->unsignedMediumInteger('volunteer_id');

            $table->foreign('event_id')
                ->references('id')
                ->on('event_pdt')
                ->onDelete('cascade');

            $table->foreign('volunteer_id')
                ->references('id')
                ->on('volunteers')
                ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_pdt');
        Schema::dropIfExists('volunteer_join_events');
    }
};
