<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_escolas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('residencia', 10);
            $table->text('descricao');

            $table->foreignId('escola_id')->constrained()->onDelete('cascade');
            $table->foreignId('endereco_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco_escolas');
    }
}
