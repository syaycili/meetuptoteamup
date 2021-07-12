<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjelersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projelers', function (Blueprint $table) {
            $table->id();
            $table->text('ProjeBaslik',100);
            $table->text('ProjeAciklama');
            $table->text('ProjeKategori', 100);
            $table->text('Sahip',100);
            $table->varchar('Benzersizkimlik',100);
            $table->integer('UyeSayisi')->default('1');
            $table->integer('KatilimcilarId')->default('1');
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
        Schema::dropIfExists('projelers');
    }
}
