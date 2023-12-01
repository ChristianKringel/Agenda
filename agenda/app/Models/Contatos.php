<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $table = 'contatos';
    
    protected $fillable = ['nome', 'endereco_id' ,'nroCel', 'email', 'nota', 'autentication_id'];


    //Cardinalidades explicadas no arquivo tabelas relacionais. 
    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }

    public function autenticacao()
    {
        return $this->belongsTo(Autentication::class, 'autentication_id');
    }
}

// Endereco::class