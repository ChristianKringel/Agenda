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
        Schema::create('possui', function (Blueprint $table) {
            $table->bigInteger('idAutentication')->unsigned(); 
            $table->biginteger('idContatos')->unsigned();
    
    
            $table->foreign('idAutentication')->references('id')->on('autentication');
            $table->foreign('idContatos')->references('id')->on('contatos');
            $table->primary(['idAutentication', 'idContatos']); // Composição de chaves primárias por ser uma tabela originada de n,n 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('possui');
    }
};
