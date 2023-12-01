<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

//Cardinalidades explicadas no arquivo tabelas relacionais. 
class Autentication extends Model implements AuthenticatableContract
{
    use Authenticatable, Notifiable;

    protected $fillable = [
        'email', 'senha',
    ];

    protected $table = 'autentication';

    public function contatos()
    {
        return $this->hasMany(Contatos::class);
    }
}
