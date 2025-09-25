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
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('kategori',150);
        });

        Schema::create('berita_dan_artikel', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('jenis_id')->unsigned()->nullable();
            $table->string('judul',150);
            $table->string('thumbnails')->nullable();
            $table->string('hastag')->nullable();
            $table->text('content');
            $table->string('author',40);
            $table->timestamp('published_datetime')->useCurrent();
            $table->timestamps();

            $table->foreign('jenis_id')
            ->references('id')
            ->on('kategori_berita')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_dan_artikel');
        Schema::dropIfExists('kategori_berita');
    }
};
