<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbNilaiahpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilaiahp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria_a')
                ->constrained('tb_kriteria')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_kriteria_b')
                ->constrained('tb_kriteria')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('bobot',255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_nilaiahp');
    }
}
