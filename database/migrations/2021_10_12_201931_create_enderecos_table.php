<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('paise_id')->constrained()->onDelete('cascade');
            $table->foreignId('provincia_id')->constrained()->onDelete('cascade');
            $table->foreignId('municipio_id')->constrained()->onDelete('cascade');
            $table->foreignId('bairro_id')->constrained()->onDelete('cascade');
            $table->foreignId('rua_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
