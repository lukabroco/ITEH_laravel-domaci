<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePutovanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('putovanjas', function (Blueprint $table) {
            $table->id();
            $table->string('destinacija');
            $table->string('trajanje');
            $table->text('opis');
            $table->string('slika');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('putovanjas');
    }
}
