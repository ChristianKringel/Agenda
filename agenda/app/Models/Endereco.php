<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Cardinalidades explicadas no arquivo tabelas relacionais. 

class Endereco extends Model
{
    protected $table = 'enderecos';
    protected $fillable = ['rua', 'bairro', 'cidade', 'estado', 'cep', 'numero', 'complemento'];

    public function contatos()
    {
        return $this->hasMany(Contatos::class, 'endereco_id');
    }
}
