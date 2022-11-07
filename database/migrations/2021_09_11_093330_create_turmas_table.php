<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('turmaName', 5);
            $table->string('sala', 4)->nullable();
            $table->boolean('turno');
            $table->dateTime('anoLectivo');

            $table->foreignId('classe_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //A todos os dados relacionados a esta coluna
        Schema::dropIfExists('turmas');
    }
}
