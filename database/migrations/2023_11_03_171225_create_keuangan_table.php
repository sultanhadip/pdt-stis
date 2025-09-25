<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('lap_keuangan', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name',100);
            $table->mediumInteger('debit')->unsigned();
            $table->timestamps();
        });

        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('id_lap')->unsigned()->nullable();
            $table->string('jenis_pengeluaran',100);
            $table->mediumInteger('harga_satuan')->unsigned();
            $table->smallInteger('jumlah_unit')->length(3)->unsigned()->nullable();
            $table->mediumInteger('total')->unsigned();
            $table->string('ket_pendanaan',100);
            $table->timestamps();

            $table->foreign('id_lap')
                ->references('id')
                ->on('lap_keuangan')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });

        Schema::create('pemasukan', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('id_lap')->unsigned()->nullable();
            $table->string('ket_pendanaan',100);
            $table->mediumInteger('total')->unsigned;
            $table->timestamps();

            $table->foreign('id_lap')
                ->references('id')
                ->on('lap_keuangan')
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
        Schema::dropIfExists('lap_keuangan');
        Schema::dropIfExists('pengeluaran');
        Schema::dropIfExists('pemasukan');
    }
};
