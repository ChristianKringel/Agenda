<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->id('id'); // Adicionei um id autoincrementável
            $table->bigInteger('nroCel');
            $table->timestamps();
            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->text('nota')->nullable();
            $table->biginteger('endereco_id')->unsigned()->nullable(); // Renomeei para 'endereco_id'
            $table->biginteger('autentication_id')->unsigned()->nullable();
            $table->foreign('autentication_id')->references('id')->on('autentication')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
